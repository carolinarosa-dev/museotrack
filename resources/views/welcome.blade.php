<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Museu Escolar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .logo {
            width: 200px;
            height: auto;
        }
        .card-custom {
            border-radius: 12px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.2);
        }
    </style>
</head>
<body>
<div class="container mt-4">
    <div class="text-center mb-4">
        <img src="{{ asset('images/logo.jpg') }}" alt="Logotipo" class="logo">
        <h1 class="mt-2">Museu Escolar</h1>
      {{-- <a href="{{ route('login') }}" class="btn btn-success mt-2">Iniciar Sessão</a>--}}
        <a href="{{ url('/admin/login') }}" class="btn btn-success">
            Iniciar sessão
        </a>

    </div>

    <div class="row">
        <!-- Eventos -->
        <div class="col-md-6">
            <div class="card card-custom mb-4">
                <div class="card-header bg-primary text-white">📅 Próximos Eventos</div>
                <div class="card-body">
                    @forelse($eventos as $evento)
                        <h5>{{ $evento->titulo }}</h5>
                        <p>{{ $evento->descricao }}</p>
                        <small><b>Data:</b> {{ $evento->data_inicio }}
                            @if($evento->data_fim) até {{ $evento->data_fim }} @endif</small><br>
                        <small><b>Publicado por:</b> {{ $evento->autor }}</small>
                        <hr>
                    @empty
                        <p>Sem eventos disponíveis.</p>
                    @endforelse
                </div>
            </div>
        </div>

        <!-- Notícias -->
        <div class="col-md-6">
            <div class="card card-custom mb-4">
                <div class="card-header bg-warning">📰 Últimas Notícias</div>
                <div class="card-body">
                    @forelse($noticias as $noticia)
                        <h5>{{ $noticia->titulo }}</h5>
                        <p>{{ $noticia->conteudo }}</p>
                        <small><b>Data:</b> {{ $noticia->data_publicacao }}</small><br>
                        <small><b>Publicado por:</b> {{ $noticia->autor }}</small>
                        <hr>
                    @empty
                        <p>Sem notícias disponíveis.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Rodapé fixo -->
<footer class="bg-gray-800 text-black text-center py-3 fixed bottom-0 w-full shadow-lg">
    <p>&copy; {{ date('Y') }} Museu Escolar - Página criada pela Câmara Municipal de Vila Nova de Poiares</p>
</footer>


</body>
</html>
