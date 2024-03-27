<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\Record;

class RecordController extends Controller
{
    public function index()
    {
        $records = Record::with('category')
            ->orderBy('created_at', 'desc')
            ->get();
        return response()->json([
            'status' => 'success',
            'message' => '学習記録の一覧を取得しました',
            'records' => $records
        ], 200);
    }
}
