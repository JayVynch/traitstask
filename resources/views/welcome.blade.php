<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

       <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="bg-blue-400 h-screen">
            <div class="relative overflow-hidden">
                <header class="relative">
                    <div class="bg-blue-400 pt-6">
                        <nav class="relative max-w-7xl mx-auto flex items-center justify-between px-4 sm:px-6" aria-label="Global">
                            <div class="flex items-center flex-1">
                                <div class="flex items-center justify-between w-full md:w-auto">
                                    <a href="#">
                                        <span class="sr-only">teamway</span>
                                        <img class="h-8 w-auto sm:h-10"  src="https://uploads-ssl.webflow.com/60590851dbb9ac7f8483c542/605a6256621174137c7cb8ba_Teamway_Logo.svg" loading="lazy" alt="">
                                    </a>
                                    <div class="-mr-2 flex items-center md:hidden">
                                        <button type="button" class="bg-gray-900 rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:bg-gray-800 focus:outline-none focus:ring-2 focus-ring-inset focus:ring-white" aria-expanded="false">
                                            <span class="sr-only">Open main menu</span>
                                            <!-- Heroicon name: outline/menu -->
                                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                            </svg>
                                        </button>
                                  </div>
                                </div>
                            </div>
                        </nav>
                    </div>

                
                    <div class="absolute top-0 inset-x-0 p-2 transition transform origin-top md:hidden">
                        <div class="rounded-lg shadow-md bg-white ring-1 ring-black ring-opacity-5 overflow-hidden">
                            <div class="px-5 pt-4 flex items-center justify-between">
                                <div>
                                    <img class="h-8 w-auto"  src="https://uploads-ssl.webflow.com/60590851dbb9ac7f8483c542/605a6256621174137c7cb8ba_Teamway_Logo.svg" loading="lazy" alt="">
                                </div>
                                <div class="-mr-2">
                                    <button type="button" class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-cyan-600">
                                        <span class="sr-only">Close menu</span>
                                        <!-- Heroicon name: outline/x -->
                                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>
                <main>
                    <div class="pt-10 bg-blue-400 sm:pt-16 lg:pt-8 lg:pb-14 lg:overflow-hidden">
                        <div class="mx-auto max-w-7xl lg:px-8">
                          <div class="lg:grid lg:grid-cols-2 lg:gap-8">
                            <div class="mx-auto max-w-md px-4 sm:max-w-2xl sm:px-6 sm:text-center lg:px-0 lg:text-left lg:flex lg:items-center">
                                <div class="lg:py-24">
                                    <h1 class="mt-4 text-4xl tracking-tight font-extrabold text-white sm:mt-5 sm:text-6xl lg:mt-6 xl:text-6xl">
                                        <span class="block">Traits Calculator</span>
                                    </h1>
                                    <p class="text-base text-white sm:text-xl lg:text-lg xl:text-xl">
                                      Are You a An Introvert Or An Extrovert ??
                                    </p>
                                    <div  x-data="app()" x-cloak class="mt-10 sm:mt-12">
                                        <form action="{{ route('trait') }}" method="post" class="sm:max-w-xl sm:mx-auto lg:mx-0">
                                            @csrf
                                            @foreach($questions as $key => $question)

                                            <div x-show.transition.in="step === {{ $key }}" class="sm:flex border border-white px-4 py-2 my-2 bg-gray-100 rounded-lg">
                                                <div class="min-w-0 flex-1">
                                                    <p class="text-xl mb-4 text-gray-800">
                                                        {{$question['q']}}
                                                    </p>
                                                    
                                                    @foreach($question['a'] as $ans)
                                                    @php
                                                        $trait = explode(',',$ans)
                                                    @endphp

                                                    <div>
                                                        <fieldset class="mt-2">
                                                            <div class="divide-y divide-gray-200">
                                                                <div class="relative flex items-start py-4 bg-white px-4 rounded-lg">
                                                                    <div class="mr-3 flex items-center h-5">
                                                                      <input  id="triat-checking" aria-describedby="triat-checking-description" name="triat-{{ $key }}" type="radio" checked class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300" value="{{ $trait[1] }}" x-model="btnDisable">
                                                                    </div>
                                                                    <div class="min-w-0 flex-1 text-sm">
                                                                        <label for="triat-checking" class="font-medium text-gray-800">{{ $trait[0] }}</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                            @endforeach
                                            <div class="mt-4 sm:mt-0 sm:ml-3" x-show.transition="step === 4">
                                                <button type="submit"
                                                        x-show="step == 4"
                                                    class="block w-full py-3 px-4 rounded-md 
                                                shadow bg-gradient-to-r from-teal-500 to-cyan-600 text-white font-medium hover:from-teal-600 hover:to-cyan-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-400 focus:ring-offset-gray-900">Submit</button>
                                            </div>
                                            <div class="mt-4 sm:mt-0 sm:ml-3" x-show.transition="step != 4">
                                                <button
                                                x-bind:disabled="!btnDisable"
                                                type="button"
                                                @click="step++"
                                                x-show="step < 4"
                                                class="block w-full py-3 px-4 rounded-md shadow bg-gradient-to-r from-teal-500 to-cyan-600 text-white font-medium hover:from-teal-600 hover:to-cyan-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-400 focus:ring-offset-gray-900">Next</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                          </div>
                        </div>
                    </div>
              </main>
            </div>
        </div>

        <script>
            function app(){
                return {
                    step : 0,
                    btnDisable : false
                }
            }
        </script>
    </body>
</html>
