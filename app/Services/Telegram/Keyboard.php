<?php

namespace App\Services\Telegram;

class Keyboard {

    public static function start(){

        $keyboard = [
            [
                [
                    'text' => __('telegram.keyboard.start_bot.brief_info'),
                    'callback_data' => json_encode([
                        'action' => 'brief_info',
                    ]),
                ]
            ],
            [
                [
                    'text' => __('telegram.keyboard.start_bot.first_stage'),
                    'callback_data' => json_encode([
                        'action' => 'first_stage',
                    ]),
                ]
            ],
            [
                [
                    'text' => __('telegram.keyboard.start_bot.most_battles'),
                    'callback_data' => json_encode([
                        'action' => 'most_battles',
                    ]),
                ]
            ],
            [
                [
                    'text' => __('telegram.keyboard.start_bot.difficulties'),
                    'callback_data' => json_encode([
                        'action' => 'difficulties',
                    ]),
                ]
            ],
            [
                [
                    'text' => __('telegram.keyboard.start_bot.women_war'),
                    'callback_data' => json_encode([
                        'action' => 'women_war',
                    ]),
                ]
            ],
            [
                [
                    'text' => __('telegram.keyboard.start_bot.result_memory'),
                    'callback_data' => json_encode([
                        'action' => 'result_memory',
                    ]),
                ]
            ],
        ];

        return json_encode([
            'inline_keyboard' => $keyboard,
            'resize_keyboard' => true,  
            'one_time_keyboard' => true,
        ]);

    }

    public static function briefInfo(){
        $keyboard = [
            [
                [
                    'text' => __('telegram.keyboard.brief_info.brief_info_1_1'),
                    'callback_data' => json_encode([
                        'action' => 'brief_info_1_1',
                        'img' => '1.1.jpg',
                    ]),
                ]
            ],
            [
                [
                    'text' => __('telegram.keyboard.brief_info.brief_info_1_2'),
                    'callback_data' => json_encode([
                        'action' => 'brief_info_1_2',
                        'img' => '1.2.jpg',
                    ]),
                ]
            ],
            [
                [
                    'text' => __('telegram.keyboard.brief_info.brief_info_1_3'),
                    'callback_data' => json_encode([
                        'action' => 'brief_info_1_3',
                        'img' => '1.3.jpg',
                    ]),
                ]
            ],
            [
                [
                    'text' => __('telegram.keyboard.menu'),
                    'callback_data' => json_encode([
                        'action' => 'start',
                    ]),
                ]
            ],
        ];

        return json_encode([
            'inline_keyboard' => $keyboard,
            'resize_keyboard' => true,  
            'one_time_keyboard' => true,
        ]);

    }


    public static function backBrief(){
        $keyboard = [
            [
                [
                    'text' => __('telegram.keyboard.back'),
                    'callback_data' => json_encode([
                        'action' => 'brief_info',
                    ]),
                ]
            ],
        ];

        return json_encode([
            'inline_keyboard' => $keyboard,
            'resize_keyboard' => true,  
            'one_time_keyboard' => true,
        ]);

    }

    public static function firstInfo(){
        $keyboard = [
            [
                [
                    'text' => __('telegram.keyboard.first_stage.first_stage_2_1'),
                    'callback_data' => json_encode([
                        'action' => 'first_stage_2_1',
                        'img' => '2.1.jpg',
                    ]),
                ]
            ],
            [
                [
                    'text' => __('telegram.keyboard.first_stage.first_stage_2_2'),
                    'callback_data' => json_encode([
                        'action' => 'first_stage_2_2',
                        'img' => '2.2.jpg',
                    ]),
                ]
            ],
            [
                [
                    'text' => __('telegram.keyboard.first_stage.first_stage_2_3'),
                    'callback_data' => json_encode([
                        'action' => 'first_stage_2_3',
                        'img' => '2.3.jpg',
                    ]),
                ]
            ],
            [
                [
                    'text' => __('telegram.keyboard.menu'),
                    'callback_data' => json_encode([
                        'action' => 'start',
                    ]),
                ]
            ],
        ];

        return json_encode([
            'inline_keyboard' => $keyboard,
            'resize_keyboard' => true,  
            'one_time_keyboard' => true,
        ]);

    }


    public static function backFirst(){
        $keyboard = [
            [
                [
                    'text' => __('telegram.keyboard.back'),
                    'callback_data' => json_encode([
                        'action' => 'first_stage',
                    ]),
                ]
            ],
        ];

        return json_encode([
            'inline_keyboard' => $keyboard,
            'resize_keyboard' => true,  
            'one_time_keyboard' => true,
        ]);

    }

    public static function mostInfo(){
        $keyboard = [
            [
                [
                    'text' => __('telegram.keyboard.most_battles.most_battles_3_1'),
                    'callback_data' => json_encode([
                        'action' => 'most_battles_3_1',
                        'img' => '3.1.jpg',
                    ]),
                ]
            ],
            [
                [
                    'text' => __('telegram.keyboard.most_battles.most_battles_3_2'),
                    'callback_data' => json_encode([
                        'action' => 'most_battles_3_2',
                        'img' => '3.2.jpg',
                    ]),
                ]
            ],
            [
                [
                    'text' => __('telegram.keyboard.most_battles.most_battles_3_3'),
                    'callback_data' => json_encode([
                        'action' => 'most_battles_3_3',
                        'img' => '3.3.jpg',
                    ]),
                ]
            ],
            [
                [
                    'text' => __('telegram.keyboard.menu'),
                    'callback_data' => json_encode([
                        'action' => 'start',
                    ]),
                ]
            ],
        ];

        return json_encode([
            'inline_keyboard' => $keyboard,
            'resize_keyboard' => true,  
            'one_time_keyboard' => true,
        ]);

    }

    public static function backMost(){
        $keyboard = [
            [
                [
                    'text' => __('telegram.keyboard.back'),
                    'callback_data' => json_encode([
                        'action' => 'most_battles',
                    ]),
                ]
            ],
        ];

        return json_encode([
            'inline_keyboard' => $keyboard,
            'resize_keyboard' => true,  
            'one_time_keyboard' => true,
        ]);

    }

    public static function difficultiesInfo(){
        $keyboard = [
            [
                [
                    'text' => __('telegram.keyboard.difficulties.difficulties_4_1'),
                    'callback_data' => json_encode([
                        'action' => 'difficulties_4_1',
                        'img' => '4.1.png',
                    ]),
                ]
            ],
            [
                [
                    'text' => __('telegram.keyboard.difficulties.difficulties_4_2'),
                    'callback_data' => json_encode([
                        'action' => 'difficulties_4_2',
                        'img' => '4.2.jpg',
                    ]),
                ]
            ],
            [
                [
                    'text' => __('telegram.keyboard.difficulties.difficulties_4_3'),
                    'callback_data' => json_encode([
                        'action' => 'difficulties_4_3',
                        'img' => '4.3.jpg',
                    ]),
                ]
            ],
            [
                [
                    'text' => __('telegram.keyboard.menu'),
                    'callback_data' => json_encode([
                        'action' => 'start',
                    ]),
                ]
            ],
        ];

        return json_encode([
            'inline_keyboard' => $keyboard,
            'resize_keyboard' => true,  
            'one_time_keyboard' => true,
        ]);

    }

    public static function backDiff(){
        $keyboard = [
            [
                [
                    'text' => __('telegram.keyboard.back'),
                    'callback_data' => json_encode([
                        'action' => 'difficulties',
                    ]),
                ]
            ],
        ];

        return json_encode([
            'inline_keyboard' => $keyboard,
            'resize_keyboard' => true,  
            'one_time_keyboard' => true,
        ]);

    }

    public static function womenInfo(){
        $keyboard = [
            [
                [
                    'text' => __('telegram.keyboard.women_war.women_war_5_1'),
                    'callback_data' => json_encode([
                        'action' => 'women_war_5_1',
                        'img' => '5.1.jpg',
                    ]),
                ]
            ],
            [
                [
                    'text' => __('telegram.keyboard.women_war.women_war_5_2'),
                    'callback_data' => json_encode([
                        'action' => 'women_war_5_2',
                        'img' => '5.2.jpg',
                    ]),
                ]
            ],
            [
                [
                    'text' => __('telegram.keyboard.women_war.women_war_5_3'),
                    'callback_data' => json_encode([
                        'action' => 'women_war_5_3',
                        'img' => '5.3.jpg',
                    ]),
                ]
            ],
            [
                [
                    'text' => __('telegram.keyboard.menu'),
                    'callback_data' => json_encode([
                        'action' => 'start',
                    ]),
                ]
            ],
        ];

        return json_encode([
            'inline_keyboard' => $keyboard,
            'resize_keyboard' => true,  
            'one_time_keyboard' => true,
        ]);

    }

    public static function backWomen(){
        $keyboard = [
            [
                [
                    'text' => __('telegram.keyboard.back'),
                    'callback_data' => json_encode([
                        'action' => 'women_war',
                    ]),
                ]
            ],
        ];

        return json_encode([
            'inline_keyboard' => $keyboard,
            'resize_keyboard' => true,  
            'one_time_keyboard' => true,
        ]);

    }

    public static function resultInfo(){
        $keyboard = [
            [
                [
                    'text' => __('telegram.keyboard.result_memory.result_memory_6_1'),
                    'callback_data' => json_encode([
                        'action' => 'result_memory_6_1',
                        'img' => '6.1.jpg',
                    ]),
                ]
            ],
            [
                [
                    'text' => __('telegram.keyboard.result_memory.result_memory_6_2'),
                    'callback_data' => json_encode([
                        'action' => 'result_memory_6_2',
                        'img' => '6.2.jpg',
                    ]),
                ]
            ],
            [
                [
                    'text' => __('telegram.keyboard.result_memory.result_memory_6_3'),
                    'callback_data' => json_encode([
                        'action' => 'result_memory_6_3',
                        'img' => '6.3.jpg',
                    ]),
                ]
            ],
            [
                [
                    'text' => __('telegram.keyboard.menu'),
                    'callback_data' => json_encode([
                        'action' => 'start',
                    ]),
                ]
            ],
        ];

        return json_encode([
            'inline_keyboard' => $keyboard,
            'resize_keyboard' => true,  
            'one_time_keyboard' => true,
        ]);

    }

    public static function backResult(){
        $keyboard = [
            [
                [
                    'text' => __('telegram.keyboard.back'),
                    'callback_data' => json_encode([
                        'action' => 'result_memory',
                    ]),
                ]
            ],
        ];

        return json_encode([
            'inline_keyboard' => $keyboard,
            'resize_keyboard' => true,  
            'one_time_keyboard' => true,
        ]);

    }



}