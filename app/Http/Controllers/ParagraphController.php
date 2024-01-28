<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paragraph;

class ParagraphController extends Controller
{

    public function store(Request $request)
    {
        $bubbs_data = $request;

        $paragraph = new Paragraph();

        $paragraph->content = $bubbs_data['content'];

        $paragraph->post_id = $bubbs_data['post_id'];

        $paragraph->save();

        if(isset($paragraph) && !empty($paragraph)) {
            return response()->json($paragraph);
        } else {
            return response()->json([
                'bubbs_message' => 'You need to bring something to the table'
            ]);
        }
    }

    public function delete(Request $request)
    {
        $bubbs_data = $request;

        $paragraph = Paragraph::where('id', $bubbs_data['id']);

        $paragraph->is_deleted = $bubbs_data['is_deleted'];

        $paragraph->save();
    }

}
