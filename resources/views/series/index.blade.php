<x-layout title="Séries">
    <a href="{{route('series.create')}}" class="btn btn-dark mb-2" >Adicionar</a>


    @isset($mensagemSucesso)
        <div id="mensagem-sucesso" class="alert alert-success">
            {{ $mensagemSucesso }}
        </div>
        <script>
            // Remove a mensagem de sucesso após 2 segundos (2000 ms)
            setTimeout(function() {
                var mensagem = document.getElementById('mensagem-sucesso');
                if (mensagem) {
                    mensagem.style.transition = "opacity 1s ease";
                    mensagem.style.opacity = "0";
                    setTimeout(() => mensagem.remove(), 1000); // Remove o elemento após a transição
                }
            }, 2000);
        </script>
    @endisset



    <ul class="list-group">
         @foreach ($series as $serie)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <a href="{{ route('seasons.index', $serie->id) }}">
                    {{ $serie->nome }}
                </a>
            <span class="d-flex">
            <a href="{{route('series.edit', $serie->id)}}" class="btn btn-secondary btn-sm">Editar</a>


            <form action="{{ route('series.destroy', $serie->id) }}" method="post" class="ms-2"
                  onsubmit="this.querySelector('button').disabled = true;">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm">Apagar</button>
            </form>


            </span>
            </li>
         @endforeach
    </ul>

</x-layout>

