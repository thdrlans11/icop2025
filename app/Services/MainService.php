<?php

namespace App\Services;

use App\Models\Board;

/**
 * Class MainService
 * @package App\Services
 */
class MainService
{
    public function data()
    {
        //공지사항 리스트
        $notices = Board::where('code', 'notice')->where('hide','N')->where('main','Y')->orderByDesc('created_at')->get();
        $data['notices'] = $notices;

        return $data;
    }
}
