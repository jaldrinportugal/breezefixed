<?php

namespace App\Http\Controllers\dentistrystudent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CommunityForum;
use App\Models\Comment;

class DentistryStudentCommentController extends Controller
{
    
    public function createComment()
    {
        return view('dentistrystudent.comment.create');
    }

    public function storeComment(Request $request)
    {
        $request->validate([
            'comment' => 'required|string'
        ]);

        $comment = Comment::create([
            'comment' => $request->input('comment'),
        ]);

        return redirect()->route('dentistrystudent.comment.create')->with('success', 'Comment added successfully!');
    }

    public function showComment($communityforumsId, $commentId)
    {
        $communityforums = CommunityForum::findOrFail($communityforumsId);
        $comments = $communityforums->comments;
        $comment = Comment::findOrFail($commentId);
    
        return view('dentistrystudent.communityforum.showComment', compact('communityforums', 'comments', 'comment'));
    }

    public function deleteComment($communityforumsId, $commentId)
    {
        $communityforums = CommunityForum::findOrFail($communityforumsId);
        $comment = Comment::findOrFail($commentId);

        $comment->delete();

        return redirect()->route('dentistrystudent.showComment', $communityforums->id)->with('success', 'Comment deleted successfully!');
    }

    public function updateComment($communityforumsId, $commentId)
    {
        $communityforums = CommunityForum::findOrFail($communityforumsId);
        $comment = Comment::findOrFail($commentId);

        return view('comment.updateComment', compact('communityforums', 'comment'));
    }

    public function updatedComment(Request $request, $communityforumsId, $commentId)
    {
        $request->validate([
            'comment' => 'string',
        ]);

        $communityforums = CommunityForum::findOrFail($communityforumsId);
        $comment = Comment::findOrFail($commentId);

        $comment->update([
            'comment' => $request->input('comment'),
        ]);

        return redirect()->route('dentistrystudent.showComment', $communityforumsId->id)
            ->with('success', 'Comment updated successfully!');
    }
}
