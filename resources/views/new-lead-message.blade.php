<div>
    @foreach ($lead as $leadValues)
        <h1>Nome : {{ $leadValues->name }} </h1>
        <h3>Email : {{ $leadValues->email }} </h3>
        <p>TEXT : {{ $leadValues->message }} </p>
    @endforeach
</div>
