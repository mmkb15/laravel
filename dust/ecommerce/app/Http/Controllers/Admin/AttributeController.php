<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\AttributeValue;
use Illuminate\Http\Request;

class AttributeController extends Controller
{
    public function index(Request $request)
    {
        $attributes = Attribute::with('values')
            ->when($request->search, function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request->search . '%');
            })
            ->latest()
            ->paginate(10);

        return view('admin.attributes.index', compact('attributes'));
    }

    public function create()
    {
        return view('admin.attributes.create');
    }

    // attribute + attribute values একসাথে save করা হচ্ছে
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:attributes,name',
            'values' => 'required|array|min:1',
            'values.*' => 'required|string|max:255',
        ]);

        $attribute = Attribute::create(['name' => $validated['name']]);

        foreach ($validated['values'] as $value) {
            AttributeValue::create([
                'attribute_id' => $attribute->id,
                'value' => $value,
            ]);
        }

        return redirect()->route('attributes.index')->with('success', 'Attribute created successfully!');
    }

    public function show(Attribute $attribute)
    {
        $attribute->load('values');
        return view('admin.attributes.show', compact('attribute'));
    }

    public function edit(Attribute $attribute)
    {
        $attribute->load('values');
        return view('admin.attributes.edit', compact('attribute'));
    }

    // attribute name update + values add/update/delete
    public function update(Request $request, Attribute $attribute)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:attributes,name,' . $attribute->id,
            'values' => 'nullable|array',
            'values.*' => 'nullable|string|max:255',
            'value_ids' => 'nullable|array',
            'value_ids.*' => 'nullable|integer',
            'new_values' => 'nullable|array',
            'new_values.*' => 'nullable|string|max:255',
        ]);

        $attribute->update(['name' => $validated['name']]);

        // পুরনো values update করা
        if ($request->has('values') && $request->has('value_ids')) {
            foreach ($validated['value_ids'] as $index => $id) {
                if (!empty($validated['values'][$index])) {
                    AttributeValue::where('id', $id)
                        ->where('attribute_id', $attribute->id)
                        ->update(['value' => $validated['values'][$index]]);
                }
            }
        }

        // নতুন values যোগ করা
        if ($request->has('new_values')) {
            foreach ($validated['new_values'] as $value) {
                if (!empty($value)) {
                    AttributeValue::create([
                        'attribute_id' => $attribute->id,
                        'value' => $value,
                    ]);
                }
            }
        }

        return redirect()->route('attributes.index')->with('success', 'Attribute updated successfully!');
    }

    public function destroy(Attribute $attribute)
    {
        $attribute->values()->delete();
        $attribute->delete();

        return redirect()->route('attributes.index')->with('success', 'Attribute deleted successfully!');
    }

    // একটা single attribute value delete করার জন্য (AJAX বা direct link)
    public function destroyValue(AttributeValue $value)
    {
        $value->delete();

        return back()->with('success', 'Attribute value deleted successfully!');
    }
}
