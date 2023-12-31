<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>article show</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <h1>論文詳細</h1>
    <p>タイトル: {{ $article->title }}</p>
    <p>{!! nl2br(e($article->body)) !!}</p>

    <div class="button-group">
    <button onclick='location.href="{{ route("articles.index") }}"'>一覧へ戻る</button>
    <!-- $articleのidを元に編集ページへ遷移する -->
    <button onclick='location.href="{{ route("articles.edit", $article) }}"'>編集する</button>
        <form action="{{ route('articles.destroy', $article) }}" method="post">
            @csrf
            @method('DELETE')
            <input type="submit" value="削除する" onclick="if(!confirm('削除しますか？')){return false};">
        </form>
    </div>
</body>

</html>
