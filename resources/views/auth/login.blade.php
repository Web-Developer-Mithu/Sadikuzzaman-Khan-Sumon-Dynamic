{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Login</title>
<style>
:root {
  --barney-start: #8e2de2;
  --barney-stop: #4a00e0;
  --barney-bg-color: #250070;
  --barney-color: rgba(255, 255, 255, 0.8);
  --barney-submit-icon-color: #fff;
  --barney-input-bg-color: rgba(0, 0, 0, 0.4);
  --barney-input-icon-color: rgba(255, 255, 255, 0.3);
  --barney-input-focus-icon-color: #e82777;
  --barney-input-focus-bg-color: rgba(0, 0, 0, 0.7);
  --barney-placeholder-color: rgba(255, 255, 255, 0.7);
  --barney-submit-color: #fff;

  --slate-start: #606c88;
  --slate-stop: #3f4c6b;
  --slate-bg-color: #343e58;
  --slate-color: rgba(255, 255, 255, 0.8);
  --slate-submit-icon-color: #fff;
  --slate-input-bg-color: rgba(0, 0, 0, 0.4);
  --slate-input-icon-color: rgba(255, 255, 255, 0.3);
  --slate-input-focus-icon-color: #ffc329;
  --slate-input-focus-bg-color: rgba(0, 0, 0, 0.5);
  --slate-placeholder-color: rgba(255, 255, 255, 0.7);
  --slate-submit-color: #fff;

  --candy-start: #009fff;
  --candy-stop: #ec2f4b;
  --candy-bg-color: #00293d;
  --candy-color: rgba(255, 255, 255, 0.8);
  --candy-submit-icon-color: #fff;
  --candy-input-bg-color: rgba(0, 0, 0, 0.4);
  --candy-input-icon-color: rgba(255, 255, 255, 0.3);
  --candy-input-focus-icon-color: #24b7ff;
  --candy-input-focus-bg-color: rgba(0, 0, 0, 0.5);
  --candy-placeholder-color: rgba(255, 255, 255, 0.7);
  --candy-submit-color: #fff;

  --firewatch-start: #ef473a;
  --firewatch-stop: #cb2d3e;
  --firewatch-bg-color: #8f150c;
  --firewatch-color: rgba(255, 255, 255, 0.8);
  --firewatch-submit-icon-color: #fff;
  --firewatch-input-bg-color: rgba(0, 0, 0, 0.4);
  --firewatch-input-icon-color: rgba(255, 255, 255, 0.3);
  --firewatch-input-focus-icon-color: #ff362a;
  --firewatch-input-focus-bg-color: rgba(0, 0, 0, 0.5);
  --firewatch-placeholder-color: rgba(255, 255, 255, 0.7);
  --firewatch-submit-color: #fff;

  --citrus-start: #fdc012;
  --citrus-stop: #f37335;
  --citrus-bg-color: #c0560c;
  --citrus-color: rgba(255, 255, 255, 0.8);
  --citrus-submit-icon-color: #fff;
  --citrus-input-bg-color: rgba(0, 0, 0, 0.4);
  --citrus-input-icon-color: rgba(255, 255, 255, 0.3);
  --citrus-input-focus-icon-color: #ffe142;
  --citrus-input-focus-bg-color: rgba(0, 0, 0, 0.5);
  --citrus-placeholder-color: rgba(255, 255, 255, 0.7);
  --citrus-submit-color: #fff;

  --marsh-start: #8dc26f;
  --marsh-stop: #76b852;
  --marsh-bg-color: #518336;
  --marsh-color: rgba(255, 255, 255, 0.8);
  --marsh-submit-icon-color: #fff;
  --marsh-input-bg-color: rgba(0, 0, 0, 0.4);
  --marsh-input-icon-color: rgba(255, 255, 255, 0.3);
  --marsh-input-focus-icon-color: #86dd54;
  --marsh-input-focus-bg-color: rgba(0, 0, 0, 0.5);
  --marsh-placeholder-color: rgba(255, 255, 255, 0.7);
  --marsh-submit-color: #fff;

  --frost-start: #004e92;
  --frost-stop: #000d7a;
  --frost-bg-color: #00052d;
  --frost-color: rgba(255, 255, 255, 0.8);
  --frost-submit-icon-color: #fff;
  --frost-input-bg-color: rgba(0, 0, 0, 0.4);
  --frost-input-icon-color: rgba(255, 255, 255, 0.3);
  --frost-input-focus-icon-color: #24b7ff;
  --frost-input-focus-bg-color: rgba(0, 0, 0, 0.5);
  --frost-placeholder-color: rgba(255, 255, 255, 0.7);
  --frost-submit-color: #fff;

  --bg-color: var(--barney-bg-color);
  --color: var(--barney-color);
  --start: var(--barney-start);
  --stop: var(--barney-stop);
  --submit-icon-color: var(--barney-submit-icon);
  --input-bg-color: var(--barney-input-bg-color);
  --input-icon-color: var(--barney-input-icon-color);
  --input-focus-icon-color: var(--barney-input-focus-icon-color);
  --input-focus-bg-color: var(--barney-input-focus-bg-color);
  --placeholder-color: var(--barney-placeholder-color);
  --submit-color: var(--barney-submit-color);
}

* {
  box-sizing: border-box;
}

body {
  background-color: var(--bg-color);
  color: var(--color);
  display: flex;
  flex-direction: column;
  font-family: "Poppins", sans-serif;
  height: 100vh;
  align-items: center;
  justify-content: center;
  transition: background-color 300ms ease-in-out;

  &.barney {
    --bg-color: var(--barney-bg-color);
    --color: var(--barney-color);
    --start: var(--barney-start);
    --stop: var(--barney-stop);
    --submit-icon-color: var(--barney-submit-icon);
    --input-bg-color: var(--barney-input-bg-color);
    --input-icon-color: var(--barney-input-icon-color);
    --input-focus-icon-color: var(--barney-input-focus-icon-color);
    --input-focus-bg-color: var(--barney-input-focus-bg-color);
    --placeholder-color: var(--barney-placeholder-color);
    --submit-color: var(--barney-submit-color);
  }

  &.slate {
    --bg-color: var(--slate-bg-color);
    --color: var(--slate-color);
    --start: var(--slate-start);
    --stop: var(--slate-stop);
    --submit-icon-color: var(--slate-submit-icon);
    --input-bg-color: var(--slate-input-bg-color);
    --input-icon-color: var(--slate-input-icon-color);
    --input-focus-icon-color: var(--slate-input-focus-icon-color);
    --input-focus-bg-color: var(--slate-input-focus-bg-color);
    --placeholder-color: var(--slate-placeholder-color);
    --submit-color: var(--slate-submit-color);
  }

  &.candy {
    --bg-color: var(--candy-bg-color);
    --color: var(--candy-color);
    --start: var(--candy-start);
    --stop: var(--candy-stop);
    --submit-icon-color: var(--candy-submit-icon);
    --input-bg-color: var(--candy-input-bg-color);
    --input-icon-color: var(--candy-input-icon-color);
    --input-focus-icon-color: var(--candy-input-focus-icon-color);
    --input-focus-bg-color: var(--candy-input-focus-bg-color);
    --placeholder-color: var(--candy-placeholder-color);
    --submit-color: var(--candy-submit-color);
  }

  &.firewatch {
    --bg-color: var(--firewatch-bg-color);
    --color: var(--firewatch-color);
    --start: var(--firewatch-start);
    --stop: var(--firewatch-stop);
    --submit-icon-color: var(--firewatch-submit-icon);
    --input-bg-color: var(--firewatch-input-bg-color);
    --input-icon-color: var(--firewatch-input-icon-color);
    --input-focus-icon-color: var(--firewatch-input-focus-icon-color);
    --input-focus-bg-color: var(--firewatch-input-focus-bg-color);
    --placeholder-color: var(--firewatch-placeholder-color);
    --submit-color: var(--firewatch-submit-color);
  }

  &.citrus {
    --bg-color: var(--citrus-bg-color);
    --color: var(--citrus-color);
    --start: var(--citrus-start);
    --stop: var(--citrus-stop);
    --submit-icon-color: var(--citrus-submit-icon);
    --input-bg-color: var(--citrus-input-bg-color);
    --input-icon-color: var(--citrus-input-icon-color);
    --input-focus-icon-color: var(--citrus-input-focus-icon-color);
    --input-focus-bg-color: var(--citrus-input-focus-bg-color);
    --placeholder-color: var(--citrus-placeholder-color);
    --submit-color: var(--citrus-submit-color);
  }

  &.marsh {
    --bg-color: var(--marsh-bg-color);
    --color: var(--marsh-color);
    --start: var(--marsh-start);
    --stop: var(--marsh-stop);
    --submit-icon-color: var(--marsh-submit-icon);
    --input-bg-color: var(--marsh-input-bg-color);
    --input-icon-color: var(--marsh-input-icon-color);
    --input-focus-icon-color: var(--marsh-input-focus-icon-color);
    --input-focus-bg-color: var(--marsh-input-focus-bg-color);
    --placeholder-color: var(--marsh-placeholder-color);
    --submit-color: var(--marsh-submit-color);
  }

  &.frost {
    --bg-color: var(--frost-bg-color);
    --color: var(--frost-color);
    --start: var(--frost-start);
    --stop: var(--frost-stop);
    --submit-icon-color: var(--frost-submit-icon);
    --input-bg-color: var(--frost-input-bg-color);
    --input-icon-color: var(--frost-input-icon-color);
    --input-focus-icon-color: var(--frost-input-focus-icon-color);
    --input-focus-bg-color: var(--frost-input-focus-bg-color);
    --placeholder-color: var(--frost-placeholder-color);
    --submit-color: var(--frost-submit-color);
  }
}

ul.theme-picker {
  background-color: rgba(0, 0, 0, 0.5);
  list-style-type: none;
  border-radius: 8px;
  display: flex;
  padding: 7px 7px;
  margin-bottom: 50px;
  margin-top: 50px;

  li {
    margin-right: 8px;
    width: 30px;
    height: 30px;
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 1;
    border-radius: 4px;
    cursor: pointer;
    transition: all 200ms ease-in-out;
    position: relative;

    &:before {
      background-color: #222;
      border-radius: 4px;
      content: "";
      display: block;
      font-size: 12px;
      opacity: 0;
      padding: 6px 10px;
      position: absolute;
      top: -45px;
    }

    &:hover:before {
      opacity: 1;
    }

    &:last-child {
      margin-right: 0;
    }

    &.barney {
      background: linear-gradient(
        225deg,
        var(--barney-start) 16%,
        var(--barney-stop) 100%
      );

      &:before {
        content: "Barney";
      }
    }

    &.slate {
      background: linear-gradient(
        225deg,
        var(--slate-start),
        var(--slate-stop)
      );

      &:before {
        content: "Slate";
      }
    }

    &.candy {
      background: linear-gradient(
        225deg,
        var(--candy-start),
        var(--candy-stop)
      );

      &:before {
        content: "Candy";
      }
    }

    &.firewatch {
      background: linear-gradient(
        225deg,
        var(--firewatch-start),
        var(--firewatch-stop)
      );

      &:before {
        content: "Firewatch";
      }
    }

    &.citrus {
      background: linear-gradient(
        225deg,
        var(--citrus-start),
        var(--citrus-stop)
      );

      &:before {
        content: "Citrus";
      }
    }

    &.marsh {
      background: linear-gradient(
        225deg,
        var(--marsh-start),
        var(--marsh-stop)
      );

      &:before {
        content: "Marsh";
      }
    }

    &.frost {
      background: linear-gradient(
        225deg,
        var(--frost-start),
        var(--frost-stop)
      );

      &:before {
        content: "Frost";
      }
    }

    &.pressed,
    &.pressed:hover {
      transform: scale(1);
    }

    &.pressed:before {
      content: "";
      opacity: 0;
    }

    &.pressed:after {
      content: "\ea41";
      font-family: boxicons;
      font-weight: 400;
      font-size: 24px;
      font-style: normal;
      font-variant: normal;
      line-height: 1;
      text-rendering: auto;
      display: inline-block;
      text-transform: none;
    }

    &:hover {
      transform: scale(1.2);
    }
  }
}

form {
  background: linear-gradient(225deg, var(--start) 16%, var(--stop) 100%);
  border-radius: 8px;
  padding: 20px 30px;
  text-align: center;
  width: 375px;
  transform-style: preserve-3d;
  perspective: 1000px;

  &.rotate {
    animation-name: rotate;
    animation-duration: 1200ms;
    animation-iteration-count: 1;
    animation-timing-function: ease;
    animation-fill-mode: forwards;
  }

  i {
    color: var(--submit-icon-color);
    font-size: 30px;
    transition: color 250ms ease-in;
  }

  .input-wrapper {
    margin-bottom: 15px;
    position: relative;
    transform: translateZ(50px);

    i {
      color: var(--input-icon-color);
      position: absolute;
      right: 13px;
      top: 50%;
      transform: translateY(-50%);
    }
  }

  h1 {
    font-size: 26px;
    font-weight: 600;
    letter-spacing: 0;
    margin: 25px 0 0 0;
    transform: translateZ(50px);
  }

  p {
    color: var(--color);
    font-size: 16px;
    margin: 2px 0 44px 0;
    transform: translateZ(50px);
  }

  input[type="email"],
  input[type="text"],
  input[type="password"] {
    background-color: var(--input-bg-color);
    border: 1px solid rgba(255, 255, 255, 0.18);
    border-radius: 14px;
    box-shadow: inset 0 10px 25px rgba(0, 0, 0, 0.18);
    color: var(--color);
    font-size: 16px;
    font-weight: 500;
    letter-spacing: 0.01em;
    padding: 16px 16px 16px 18px;
    transition: all 250ms ease-in-out;
    width: 100%;
    min-height: 52px;
    backdrop-filter: blur(8px);

    &:focus {
      background-color: var(--input-focus-bg-color);
      border-color: rgba(255, 255, 255, 0.42);
      box-shadow: 0 0 0 3px rgba(255, 255, 255, 0.12), inset 0 10px 25px rgba(0, 0, 0, 0.2);
      outline: none;
    }

    &:focus + i {
      color: var(--input-focus-icon-color);
    }
  }

  input {
    width: 100%;
  }

  ::placeholder {
    color: var(--placeholder-color);
    font-size: 16px;
    opacity: 1;
  }

  .button-wrapper {
    margin-top: 10px;
    transform: translateZ(50px);
  }

  button[type="submit"] {
    background: linear-gradient(135deg, rgba(255, 255, 255, 0.18), rgba(255, 255, 255, 0.08));
    border: 1px solid rgba(255, 255, 255, 0.22);
    border-radius: 999px;
    color: var(--submit-color);
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 16px;
    font-weight: 700;
    letter-spacing: 0.04em;
    padding: 15px 20px;
    width: 100%;
    text-transform: uppercase;
    transition: transform 180ms ease, box-shadow 180ms ease, background 180ms ease;
    box-shadow: 0 16px 35px rgba(0, 0, 0, 0.18);
  }

  button[type="submit"]:hover {
    transform: translateY(-1px);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.25);
    background: linear-gradient(135deg, rgba(255, 255, 255, 0.28), rgba(255, 255, 255, 0.12));
  }

  button[type="submit"]:focus {
    outline: none;
    box-shadow: 0 0 0 3px rgba(255, 255, 255, 0.18), 0 20px 40px rgba(0, 0, 0, 0.22);
  }

  button[type="submit"] i {
    margin-left: 8px;
  }
}

@keyframes rotate {
  0% {
    transform: rotate3d(0, 0, 0, 0);
  }

  100% {
    transform: rotate3d(0, 1, 0, 360deg);
  }
}

@-webkit-keyframes rotate {
  0% {
    transform: rotate3d(0, 0, 0, 0);
  }

  100% {
    transform: rotate3d(0, 1, 0, 360deg);
  }
}

    </style>
</head>
<body>
    <ul class="theme-picker">
  <li data-theme="barney" class="barney"></li>
  <li data-theme="firewatch" class="firewatch"></li>
  <li data-theme="citrus" class="citrus"></li>
  <li data-theme="marsh" class="marsh"></li>
  <li data-theme="frost" class="frost"></li>
  <li data-theme="slate" class="slate"></li>
  <li data-theme="candy" class="candy"></li>
</ul>

<form class="form" method="POST" action="{{ route('login') }}">
    @csrf
  <h1>Welcome Back <br> Md. Sadikuzzaman</h1>
  <p>Enter your credentials to continue.</p>

  <div class="input-wrapper">
    <input type="email" placeholder="Enter your username" name="email" class="@error('email') is-invalid @enderror"/>
    <i class="bx bxs-user-circle"></i>
  </div>

  <div class="input-wrapper">
    <input type="password" placeholder="Enter your password" name="password" class="@error('password') is-invalid @enderror"/>
      @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
      @enderror
      @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
      @enderror
    <i class="bx bx-key"></i>
  </div>

  <div class="button-wrapper">
    <button type="submit">
      Sign In
      <i class="bx bx-right-arrow-alt"></i>
    </button>
  </div>
</form>

<script>
    let themeList = document.querySelector(".theme-picker");
let defaultThemeItem = themeList.firstElementChild;
let themeListItems = themeList.childNodes;
let themeTracker = themeState();
let listItemTracker = itemState();
let bodyElement = document.body;
let form = document.querySelector(".form");

init();

function init() {
  bindEvents();
  setTheme();
  defaultThemeItem.click();
}

function bindEvents() {
  themeListItems.forEach(function (element) {
    element.addEventListener("click", handleThemeChange);
  });
}

function handleThemeChange(event) {
  let selectedItem = event.target;
  let selectedTheme = event.target.dataset.theme;

  if (
    !selectedItem.classList.contains("pressed") &&
    !form.classList.contains("rotate")
  ) {
    form.classList.add("rotate");

    setSelectedThemeItem(selectedItem);

    setTimeout(() => {
      setTheme(selectedTheme);
    }, 650);

    setTimeout(() => {
      form.classList.remove("rotate");
    }, 1500);
  }
}

function setTheme(selectedTheme) {
  bodyElement.classList.remove(themeTracker.get());
  themeTracker.set(selectedTheme);
  bodyElement.classList.add(themeTracker.get());
}

function setSelectedThemeItem(selectedItem) {
  listItemTracker.get()?.classList.remove("pressed");
  listItemTracker.set(selectedItem);
  listItemTracker.get().classList.add("pressed");
}

function themeState() {
  let selectedTheme = null;
  return {
    set: function (theme) {
      selectedTheme = theme;
    },

    get: function () {
      return selectedTheme;
    }
  };
}

function itemState() {
  let selectedItem = null;
  return {
    set: function (item) {
      selectedItem = item;
    },

    get: function () {
      return selectedItem;
    }
  };
}

</script>
</body>
</html>