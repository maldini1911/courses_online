<?php

namespace App\Http\Controllers\BackEnd;
use App\Http\Requests\Backend\Messages\Update;
use Illuminate\Http\Request;
use App\Models\Message;
use App\Mail\ReplyMessage;
use Mail;

class Messages extends BackEndController
{
    public function __construct(Message $model)
    {
        parent::__construct($model);
    }

    public function update(Update $request, $id)
    {

        $this->model->findOrfail($id)->update($request->all());

        return redirect()->route('messages.edit', ['id' => $id]);
    }

    public function reply_message(Request $request, $id)
    {

        $message = $this->model->findOrfail($id);
        $reply = $request->message;
        Mail::send(new ReplyMessage($message, $reply));
        return redirect()->route('messages.edit', ['id' => $id]);
    }

}
