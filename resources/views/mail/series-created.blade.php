<x-mail::message>

# Publicação criada com sucesso!

Olá, **{{ $user->name }}**!
<br>
Acabamos de postar uma nova série: **{{ $serie->name }}**.
# Para assistir, siga os seguintes passos:

- Acesse a plataforma através clicando [aqui](https://google.com).
<x-mail::button :url="'https://google.com'">
Clique aqui para assistir!
</x-mail::button>

Atenciosamente,<br>
Equipe **Maratonando**!
</x-mail::message>
