<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{$user->name}}</title>
{{--    <link rel="stylesheet" href="{{ mix('css/app.css') }}">--}}

{{--    <script src="https://cdn.tailwindcss.com"></script>--}}
    <script src="{{ asset('tailwind.js') }}"></script>

    <style type="text/tailwindcss">
        @layer utilities {
            .content-auto {
                content-visibility: auto;
            }
        }
    </style>
    <style>
        .container {
            padding-left: 1rem;
            padding-right: 1rem;
        }
    </style>
</head>
<body>
<main class="bg-gray-200">
    <header class="py-2 bg-white">
        <div class="flex items-center justify-between container mx-auto">
            <img src="/images/logo.svg" alt=""  style='width: 65px;' />
            <button class="w-40 py-1 rounded-full border-blue-600 border-2 text-blue-700 hover:text-white hover:bg-blue-600 transition">Get your card</button>
        </div>
    </header>
    <section class="py-10">
        <div class="container mx-auto">
            <div class="bg-white border border-gray-200 rounded-2xl shadow">
                <a href="#" class="h-24 lg:h-72 block">
                    <img class="rounded-t-lg w-full h-full object-cover" src="/images/bg-user.jpg" alt="" />
                </a>
                <div class="p-5 relative">
                    @if($user->image)
                        <img class="rounded-full w-16 h-16 absolute -top-10 border-4" src="data:image/png;base64,{{$user->image}}" alt="" />
                    @else
                        <img class="rounded-full w-16 h-16 absolute -top-10 border-4"  src="https://i.pravatar.cc/100" alt="" />
                    @endif
                    <a href="#" style='cursor: default'>
                        <h5 class="mb-2 mt-4 text-2xl font-bold tracking-tight text-blue-800">{{$user->name}}</h5>
                    </a>
                    <p class="mb-3 font-normal text-gray-400">{{$user->title}}</p>
                    <p class="mb-3 font-normal text-gray-500 mt-6 lg:w-1/2">
                         {{$user->bio}}
                    </p>
                </div>
{{--                <div class="border-t py-6 px-5 flex items-center">--}}
{{--                    <button class="w-40 py-1 rounded-full border-blue-600 border-2 text-white bg-blue-600 hover:bg-blue-700 transition mr-4 font-normal">Add to Contacts</button>--}}
{{--                    <button class="w-40 py-1 rounded-full border-blue-600 border-2 text-blue-700 hover:text-white hover:bg-blue-600 transition">Exchange</button>--}}
{{--                </div>--}}
            </div>
        </div>
    </section>

    <div>
        <div class="container mx-auto pb-10">
            <div class="flex items-center justify-between py-4 px-2 lg:px-10 border-b bg-white rounded-t-2xl">
                <h3 class="-mb-1">Social Links</h3>
                <button type="button" id="show-all" class="w-40 py-1 rounded-full border-blue-600 border-2 text-blue-700 hover:text-white hover:bg-blue-600 transition text-center">
                    Show All
                </button>
            </div>
{{--            @dd($user->socials->where('status', 1))--}}

            <div class="bg-white px-2 lg:px-10 py-6 rounded-b-2xl">
                <ul class="grid grid-cols-4 lg:grid-cols-8 place-items-center px-4 gap-x-2 gap-y-4 lg:gap-10">

                    @foreach($user->socials->where('status', 1)->sortBy('sort') as $item)
{{--                        @if(is_numeric($item->url) || $item->social->name == 'whatsapp' || $item->social->name == 'Whatsapp')--}}
{{--                            <li class="flex">--}}
{{--                                <a href="https://api.whatsapp.com/send?phone= {{$item->url}}" >--}}
{{--                                <img src="{{\Illuminate\Support\Facades\Storage::url($item->social->image)}}" alt="" class="w-10 mx-auto lg:w-16 mb-2" />--}}
{{--                                <span class="text-gray-700">{{$item->social->name}} </span>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                        @else--}}
{{--                            <li class="flex">--}}
{{--                                <a href="http://{{$item->url}}"><img src="{{\Illuminate\Support\Facades\Storage::url($item->social->image)}}" alt="" class="w-10 mx-auto lg:w-16 mb-2" /> <span class="text-gray-700">{{$item->social->name}}</span></a>--}}
{{--                            </li>--}}
{{--                        @endif--}}
                            @if(is_numeric($item->url) || in_array($item->social->name, ['whatsapp', 'Whatsapp']))
                                <li class="flex">
                                    <a href="https://api.whatsapp.com/send?phone={{$item->url}}">
                                        <img src="{{ \Illuminate\Support\Facades\Storage::url($item->social->image) }}" alt="{{ $item->social->name }}" class="w-10 mx-auto lg:w-16 mb-2" />
                                        <span class="text-gray-700">{{ $item->social->name }}</span>
                                    </a>
                                </li>
                            @else
                                <li class="flex">
                                    <a href="http://{{ $item->url }}">
                                        <img src="{{ \Illuminate\Support\Facades\Storage::url($item->social->image) }}" alt="{{ $item->social->name }}" class="w-10 mx-auto lg:w-16 mb-2" />
                                        <span class="text-gray-700">{{ $item->social->name }}</span>
                                    </a>
                                </li>
                            @endif
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <div>
        <div class="container mx-auto pb-10">
            <div class="flex items-center justify-between py-4 px-2 lg:px-10 border-b bg-white rounded-t-2xl">
                <h3 class="-mb-1">Services</h3>
{{--                <button type="button" id="show-all" class="w-40 py-1 rounded-full border-blue-600 border-2 text-blue-700 hover:text-white hover:bg-blue-600 transition text-center">--}}
{{--                    Show All--}}
{{--                </button>--}}
            </div>
            <div class="bg-white px-2 lg:px-10 py-6 rounded-b-2xl">
                <ul class="grid grid-cols-1 place-items-left px-4 gap-x-2 gap-y-4 lg:gap-10">
                    @foreach($user->services as $item)
                        <li>
                            <a href="{{$item->url}}"><span class="text-gray-700">{{$item->title}}</span></a>
                            <p>
                                <small>{{$item->description}}</small>
                            </p>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <span id="overla-moedel" class="fixed inset-0 bg-black/50 backdrop-blur-sm hidden"></span>
    <div id="paren-moedel" class="model fixed bottom-[-40%] inset-x-0 transition-all">
        <div class="bg-white px-2 lg:px-10 py-6">
            <ul class="grid grid-cols-4 lg:grid-cols-8 place-items-center px-4 gap-x-2 gap-y-4 lg:gap-10">
                @foreach($user->socials->where('status', 1) as $item)
                    <li class="flex">
                        <a href="{{$item->url}}"><img src="{{\Illuminate\Support\Facades\Storage::url($item->social->image)}}" alt="" class="w-10 mx-auto lg:w-16 mb-2" /> <span class="text-gray-700">{{$item->social->name}}</span></a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</main>
<script>
  tailwind.config = {
    theme: {
      extend: {
        colors: {
          clifford: "#da373d",
        },
      },
    },
  };

  let showAll = document.getElementById("show-all");
  let overlaModel = document.getElementById("overla-moedel");
  let parenMoedel = document.getElementById("paren-moedel");
  function toggleModel() {
    overlaModel.classList.toggle("hidden");
    parenMoedel.classList.toggle("bottom-0");
  }
  showAll.addEventListener("click", toggleModel);
  overlaModel.addEventListener("click", toggleModel);
</script>
</body>
</html>
