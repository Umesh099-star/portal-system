<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>
<body>   @if (Route::has('login'))
 <nav class="-mx-3 flex flex-1 justify-end">
     @auth
      <a href="{{ url('/dashboard') }}"
     class="rounded-md px-3 py-2 text-black ring-1 ring-transparent 
     transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] 
     dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white" >
       Dashboard
     </a>
      @else
     <a href="{{ route('login') }}"
    class="rounded-md px-3 py-2 text-black ring-1 ring-transparent
     transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] 
     dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
       Log in
       </a>

          @if (Route::has('register'))
         <a href="{{ route('register') }}"
  class="rounded-md px-3 py-2 text-black ring-1 ring-transparent 
  transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] 
  dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
     Register
    </a>
        @endif
    @endauth
  </nav>
     @endif
    </a>
    <h2>welcome</h2>
    @foreach($jobs as $job)
    <div class="job-listing">
        <h3>{{ $job->title }}</h3>
        <p><strong>Category:</strong> {{ $job->category }}</p>
        <p><strong>Posted By:</strong> {{ $job->added_by == 'admin' ? 'Admin' : 'Company' }}</p>
        <p><strong>Company:</strong> {{ $job->company ? $job->company->name : 'N/A' }}</p>
        <p><strong>Location:</strong> {{ $job->location }}</p>
        <p><strong>Salary:</strong> {{ $job->salary }}</p>
    </div>
@endforeach


</body>
</html>