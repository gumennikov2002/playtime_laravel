<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Score;

class GameController extends Controller
{
    public function check_score(Request $request) {
        $uid = session()->get('session_user_id');
        $find = Score::where('user_id', $uid)->where('game', $request->game)->first();

        if ( !$find ) {
            $this->new_score($uid, $request->game, $request->score);
            return;
        }

        if ( $find->best_score < $request->score ) {
            return $this->update_score($uid, $request->game, $request->score);
        }

        return $find->best_score;
    }

    private function new_score($uid, $game, $score) {
        Score::create([
            'user_id'    => $uid,
            'game'       => $game,
            'best_score' => $score
        ]);

        return $score;
    }

    private function update_score($uid, $game, $score) {
        Score::where('user_id', $uid)->where('game', $game)->update([
            'best_score' => $score
        ]);

        return $score;
    }
}
