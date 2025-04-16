<?php

namespace App\Http\Controllers;
use App\Models\WidgetModel;
use Illuminate\Http\Request;

class WidgetController extends Controller
{
    public function show()
    {
        return view("widget");
    }
    public function fetchWidgets()
    {
        return response()->json(WidgetModel::all());
    }
    public function update(Request $request, string $id)
    {
        $widgetItem = WidgetModel::find($id);
        $widgetItem->update($request->all());
        return response()->json($widgetItem, 201);
    }
    public function create(Request $request)
    {
        $data = $request->all();
        $widget = WidgetModel::create($data);
        return response()->json($widget, 201);
    }
    public function destroy(string $id)
    {
        $widgetItem = WidgetModel::find($id);
        $widgetItem->delete();
        return response()->json(["message" => "Widget deleted successfully"]);
    }
}
