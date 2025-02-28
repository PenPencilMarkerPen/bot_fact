<?php

namespace App\Services\Telegram\Handlers;

use App\Services\Telegram\Commands\CommandBrief;
use App\Services\Telegram\Commands\CommandDiff;
use App\Services\Telegram\Commands\CommandFirst;
use App\Services\Telegram\Commands\CommandMost;
use App\Services\Telegram\Commands\CommandResult;
use App\Services\Telegram\Commands\CommandStart;
use App\Services\Telegram\Commands\CommandWomen;
use App\Services\Telegram\Keyboard;
use App\Services\Telegram\Message;
use Telegram\Bot\Laravel\Facades\Telegram as FacadesTelegram;

class CallbackHandler extends MessageHandler{

    private array $data = [];
    private int $messageId;

    public function __construct($user, $data, $messageId, $callbackId)
    {
        parent::__construct($user, '');
        $this->data = json_decode($data, true);
        $this->messageId = $messageId;
        $this->sendAnswerCallback($callbackId);
    }

    private function sendAnswerCallback($callbackId){
        FacadesTelegram::answerCallbackQuery([
            'callback_query_id' => $callbackId,
        ]);
    }

    public function handle(){

        $action = $this->data['action']?? false;


        switch($action){
            case 'start':
                (new CommandStart($this->user, $this->message, null, null, $this->messageId))->handle();
            break;
            case 'brief_info':
                $this->briefInfo();
            break;
            case 'brief_info_1_1':
            case 'brief_info_1_2':
            case 'brief_info_1_3':
                (new CommandBrief($this->user, $this->message, $this->data, null, $this->messageId))->handle();
            break;
            case 'first_stage':
                $this->firstStage();
            break;
            case 'first_stage_2_1':
            case 'first_stage_2_2':
            case 'first_stage_2_3':
                (new CommandFirst($this->user, $this->message, $this->data, null, $this->messageId))->handle();
            break;
            case 'most_battles':
                $this->mostBattle();
            break;
            case 'most_battles_3_1':
            case 'most_battles_3_2':
            case 'most_battles_3_3':
                (new CommandMost($this->user, $this->message, $this->data, null, $this->messageId))->handle();
            break;
            case 'difficulties':
                $this->difficulties();
            break;
            case 'difficulties_4_1':
            case 'difficulties_4_2':
            case 'difficulties_4_3':
                (new CommandDiff($this->user, $this->message, $this->data, null, $this->messageId))->handle();
            break;
            case 'women_war_5_1':
            case 'women_war_5_2':
            case 'women_war_5_3':
                (new CommandWomen($this->user, $this->message, $this->data, null, $this->messageId))->handle();
            break;
            case 'women_war':
                $this->womenWar();
            break;
            case 'result_memory':
                $this->resultMemory();
            break;
            case 'result_memory_6_1':
            case 'result_memory_6_2':
            case 'result_memory_6_3':
                (new CommandResult($this->user, $this->message, $this->data, null, $this->messageId))->handle();
            break;
        }
    }

    private function briefInfo(){
        Message::getInstance()->text(__('telegram.messages.brief_info'))
        ->keyboard(Keyboard::briefInfo())
        ->forceEdit($this->user->userId, $this->messageId);
    }

    private function firstStage(){
        Message::getInstance()->text(__('telegram.messages.first_stage'))
        ->keyboard(Keyboard::firstInfo())
        ->forceEdit($this->user->userId, $this->messageId);
    }

    private function mostBattle(){
        Message::getInstance()->text(__('telegram.messages.most_battles'))
        ->keyboard(Keyboard::mostInfo())
        ->forceEdit($this->user->userId, $this->messageId);
    }

    private function difficulties(){
        Message::getInstance()->text(__('telegram.messages.difficulties'))
        ->keyboard(Keyboard::difficultiesInfo())
        ->forceEdit($this->user->userId, $this->messageId);
    }

    private function womenWar(){
        Message::getInstance()->text(__('telegram.messages.women_war'))
        ->keyboard(Keyboard::womenInfo())
        ->forceEdit($this->user->userId, $this->messageId);
    }

    private function resultMemory(){
        Message::getInstance()->text(__('telegram.messages.result_memory'))
        ->keyboard(Keyboard::resultInfo())
        ->forceEdit($this->user->userId, $this->messageId);
    }


}