<link href="{{ asset('css/custom.css') }}" rel="stylesheet">

<div class="app-container">
    <h2>Search</h2>
    <input type="text" class="input-search" name="search" id="search" placeholder="Search name/designation/department">
    <div class="job-container">
        @foreach ($users as $user)
            <div class="job-card">
                <h2>{{ $user->name }}</h2>
                <h4>{{ $user->designation->name }}</h4>
                <div>{{ $user->department->name }}</div>
            </div>
        @endforeach
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    var searchUrl = "{{ route('search') }}";
</script>
<script src="{{ asset('js/custom.js') }}"></script>
