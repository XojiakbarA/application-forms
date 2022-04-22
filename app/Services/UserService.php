<?php

namespace App\Services;

use App\Http\Requests\ApplicationRequest;

class UserService
{
    public function createApplication(ApplicationRequest $request)
    {
        $user = $request->user();

        if ($request->has('file')) :
            $file_href = $request->file('file')->storeAs('files', $request->file('file')->hashName());
            $request->merge(['file_href' => $file_href]);
        endif;

        $data = $request->only('subject', 'message', 'file_href');

        $created = $user->applications()->create($data);

        return $created;
    }
}