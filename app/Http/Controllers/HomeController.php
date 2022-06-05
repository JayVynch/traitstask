<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $questions = [
            [
                'q' => 'You’re really busy at work and a colleague is telling you their life story and personal woes. You:',
                'a' => [
                    1 => 'Don’t dare to interrupt them,intro',
                    2 => 'Think it’s more important to give them some of your time; work can wait,extro',
                    3 => 'Listen, but with only with half an ear,intro',
                    4 => 'Interrupt and explain that you are really busy at the moment,extro'
                ],

            ],
            
            [
                'q' => 'You’ve been sitting in the doctor’s waiting room for more than 25 minutes. You:',
                'a' => [
                    1 => 'Look at your watch every two minutes,intro',
                    2 => 'Bubble with inner anger, but keep quiet,intro',
                    3 => 'Explain to other equally impatient people in the room that the doctor is always running late,extro',
                    4 => 'Complain in a loud voice, while tapping your foot impatiently,extro'
                ],
                
            ],
            [
                'q' => 'You’re having an animated discussion with a colleague regarding a project that you’re in charge of. You:',
                'a' => [
                    1 => 'Don’t dare contradict them,intro',
                    2 => 'Think that they are obviously right,intro',
                    3 => 'Defend your own point of view, tooth and nail,extro',
                    4 => 'Continuously interrupt your colleague,extro'
                ],
                
            ],
            [
                'q' => 'You are taking part in a guided tour of a museum. You:',
                'a' => [
                    1 => 'Are a bit too far towards the back so don’t really hear what the guide is saying,intro',
                    2 => 'Follow the group without question,intro',
                    3 => 'Make sure that everyone is able to hear properly,extro',
                    4 => 'Are right up the front, adding your own comments in a loud voice,extro'
                ],
                
            ],
            [
                'q' => 'During dinner parties at your home, you have a hard time with people who:',
                'a' => [
                    1 => 'Ask you to tell a story in front of everyone else,extro',
                    2 => 'Talk privately between themselves,intro',
                    3 => 'Hang around you all evening,intro',
                    4 => 'Always drag the conversation back to themselves,extro'
                ],
            ]
        ];

        return view('welcome', compact('questions'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'trait*' => 'required'
        ]);

        // dd($request->all());

        $result = (max($request->all()));

        return view('results',compact('result'));
    }
}
