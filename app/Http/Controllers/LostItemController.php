<?php

namespace App\Http\Controllers;

use App\Models\lostItem;
use Illuminate\Http\Request;

class LostItemController extends Controller
{
    public function index(Request $request)
    {
        $query = lostItem::query();

        if ($request->has('search') && $request->search != '') {
            $query->where(function ($q) use ($request) {
                $q->where('item_name', 'like', '%' . $request->search . '%')
                    ->orWhere('description', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->has('status') && $request->status != 'All') {
            $query->where('status', $request->status);
        }
        $items = $query->latest()->get();
        return view('lostItems.index', compact('items'));
    }

    public function create()
    {
        return view('lostItems.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'item_name' => 'required',
            'description' => 'required',
            'location_found' => 'required',
            'contact_info' => 'required'
        ]);

        $data = $request->all();
        if ($request->hasFile('image')) {
            $fileName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $fileName);
            $data['image'] = $fileName;
        }

        lostItem::create($data);
        return redirect()->route('lostItems.index')->with('success', 'Item added');
    }

    public function updateStatus($id, $status)
    {
        $item = lostItem::findOrFail($id);
        $item->status = $status;
        $item->save();

        return redirect()->back()->with('success', 'Item marked as $status');
    }

    public function destroy($id)
    {
        $item = lostItem::findOrFail($id);
        if ($item->image && file_exists(public_path('images/' . $item->image))) {
            unlink(public_path('images/' . $item->image));
        }

        $item->delete();

        return redirect()->route('lostItems.indes')->with('sucess', 'Item removed successfully');
    }
}
