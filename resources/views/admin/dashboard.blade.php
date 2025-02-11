<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>Admin Dashboard</h3>

    <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
                <Advertisement------! upload Advertisement------>
                    <!-- <h2>upload Advertisement</h2>
            <form method="post" action ="{{route ('admin.uploadAd')}}">
                         @csrf 
                         <input type="text" name="company_name" placeholder >
            </form> -->

</body>
</html>