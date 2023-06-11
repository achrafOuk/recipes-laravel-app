@extends('layouts/guest')
@section('content')




<section class="flex flex-col md:flex-row h-auto ">

  <div class="bg-white w-full md:max-w-md lg:max-w-full md:mx-auto md:w-1/2 xl:w-1/3 h-screen px-6 lg:px-16 flex">
    <div class="w-full h-100">
      <h1 class="text-xl md:text-2xl font-bold leading-tight mt-12">Register new account</h1>
      <form class="mt-6" action="{{route('register')}}" method="POST">
        @if($errors->all())
          <div class="mb-4 flex rounded-lg bg-red-50 p-4 text-sm text-red-800" role="alert">
            @foreach($errors->all() as $error)
              <p>{{$error}}</p>
            @endforeach
          </div>
        @endif
        @csrf
        <div>
          <label class="block text-gray-700">Username</label>
          <input type="text" name="name" value="{{old('name')}}" id=""  class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-blue-500 focus:bg-white focus:outline-none" required>
        </div>

        <div>
          <label class="block text-gray-700">Email Address</label>
          <input type="email" name="email" value="{{old('email')}}"  class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-blue-500 focus:bg-white focus:outline-none" required>
        </div>

        <div class="mt-4">
          <label class="block text-gray-700">Password</label>
          <input type="password" name="password" value="123456"  minlength="6" class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-blue-500 focus:bg-white focus:outline-none" required>
        </div>

        <p >Forget password?</a></p>
        <p >Need an account?  <a href="#" class="text-blue-500 hover:text-blue-700 font-semibold">Create an account</a></p>
        <button type="submit" class="w-full block bg-yellow  text-white font-semibold rounded-lg px-4 py-3 mt-6">Log In</button>
      </form>

    </div>
  </div>

</section>


@endsection