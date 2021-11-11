@extends('layouts.email')
@section('content')
<section>
    <article>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla auctor faucibus velit, id feugiat
            lorem venenatis sit amet. Proin at nisi et est rutrum pellentesque vel nec orci.
            Phasellus et augue ut lacus fringilla fermentum in id ipsum. Ut non tempor nunc.
            Suspendisse vitae mattis erat. Nullam et ex quam. Donec faucibus risus non magna ultrices, a molestie
            dui consectetur. Cras non turpis efficitur, elementum nunc non, pulvinar turpis. Duis ut tortor pulvinar,
            tristique quam in, sollicitudin nulla. Vivamus et felis lobortis, pulvinar tellus eu, scelerisque massa.
            Nullam mattis lorem quis mi ultricies fringilla.
        </p>

        <p>
            <u> {{$property->title}}, {{$property->street}}, {{$property->number}}</u>

            <strong>{{$property->city}} {{$property->state}}</strong>
        </p>

        <p>
            Nunc vitae congue sem. Phasellus ipsum diam, pellentesque ac hendrerit dictum, rhoncus et ex. Curabitur
            mauris quam, dignissim tincidunt eros quis, condimentum commodo est. Pellentesque pellentesque tristique
            pellentesque. Cras interdum, dolor ac luctus faucibus, elit odio auctor erat, vitae mollis felis elit vitae sem.
            Donec elementum volutpat odio, quis pulvinar erat aliquet nec. Morbi congue lacus sem. Nunc tincidunt
            lacinia nisl. Cras sit amet nulla consectetur, rhoncus risus ut, bibendum mauris.
        </p>

        <p>
            Integer aliquet tempor massa ac posuere. Nam fringilla lorem sit amet nunc bibendum, at finibus nunc pulvinar.
            In aliquam augue enim. Donec nisl quam, tempor non luctus sed, volutpat ac odio. Integer vehicula, ante eu
            rutrum sagittis, ex erat mollis metus, ut volutpat orci mi et turpis. Maecenas ornare magna nec nibh fermentum,
            quis fringilla orci sagittis. Etiam laoreet erat id sapien ullamcorper aliquam. Sed luctus, turpis vel volutpat
            pharetra, magna ligula pulvinar enim, at bibendum nisl sapien ac elit. Integer hendrerit arcu justo, quis aliquet
            quam tincidunt ut. Praesent elit velit, fermentum sed libero auctor, luctus auctor justo. Fusce tincidunt volutpat
            bibendum. Nam gravida turpis ex, et euismod ipsum placerat sit amet. Morbi varius faucibus purus sollicitudin bibendum.
        </p>

        <p>
            Vivamus eget bibendum nibh, a tincidunt massa. Nullam in aliquet urna. Proin imperdiet libero sit amet gravida
            convallis. Sed tristique gravida euismod. Vivamus et lobortis magna. Sed vel nulla velit. Maecenas a sem maximus,
            porta ipsum a, egestas nibh. Phasellus laoreet magna a ligula tincidunt sodales. Nam ullamcorper rhoncus ullamcorper.
            Suspendisse tristique posuere ipsum a varius. In hac habitasse platea dictumst. Vestibulum metus metus, volutpat sit
            amet nisi at, sagittis tincidunt lectus. Etiam malesuada ultrices ex, et fringilla diam dapibus in. Nam vel ipsum et
            sem suscipit feugiat non ac mauris. Praesent sed mauris odio.
        </p>

    </article>
</section>
@endsection
