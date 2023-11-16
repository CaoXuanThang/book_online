<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReviewRequest;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(ReviewRequest $request)
    {
        //create review
        $params = $request->except('_token');
        $params['user_id'] = auth()->id();
        Review::create($params);
        return redirect()->back()->with('success', 'Đánh giá thành công');
    }
}
