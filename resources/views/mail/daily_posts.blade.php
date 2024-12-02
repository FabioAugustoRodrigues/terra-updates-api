<!DOCTYPE html>
<html>

<head>
    <title>Today's Posts</title>
    <style>
        body {
            font-family: 'Verdana', sans-serif;
            line-height: 1.6;
            color: #444;
            background-color: #e9f0f5;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 70%;
            max-width: 500px;
            margin: 40px auto;
            background: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #33c9a6;
            font-size: 28px;
            text-align: center;
            margin-bottom: 20px;
        }

        p {
            margin: 15px 0;
            font-size: 16px;
        }

        .footer {
            margin-top: 30px;
            font-size: 12px;
            text-align: center;
            color: #888;
        }

        .btn-theme {
            background-color: #13aa52;
            border: 1px solid #13aa52;
            border-radius: 4px;
            box-shadow: rgba(0, 0, 0, .1) 0 2px 4px 0;
            box-sizing: border-box;
            color: #fff !important;
            text-decoration: none !important;
            cursor: pointer;
            font-family: 'Verdana', sans-serif;
            font-size: 16px;
            font-weight: 400;
            outline: none;
            outline: 0;
            padding: 10px 25px;
            text-align: center;
            transform: translateY(0);
            transition: transform 150ms, box-shadow 150ms;
            user-select: none;
            -webkit-user-select: none;
            touch-action: manipulation;
        }

        .btn-theme:hover {
            box-shadow: rgba(0, 0, 0, .15) 0 3px 9px 0;
            transform: translateY(-2px);
        }

        @media (min-width: 768px) {
            .btn-theme {
                padding: 10px 30px;
            }
        }

        .success-message {
            color: #28a745;
            font-size: 18px;
            font-weight: bold;
        }

        .error-message {
            color: #dc3545;
            font-size: 18px;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Today's Posts</h1>

        @if($posts->isEmpty())
        <p>No new posts were published today. Check back tomorrow!</p>
        @else
        @foreach($posts as $post)
        <div class="post">
            <div class="post-title">
                <a href="{{ $post->url ?? '#' }}">{{ $post->title }}</a>
            </div>
            <div class="post-content">
                {{ Str::limit($post->content, 120) }}
            </div>
            <div class="post-date">
                Published on: {{ $post->created_at->format('F j, Y, g:i a') }}
            </div>
        </div>
        @endforeach
        @endif

        <div class="footer">
            <p>You're receiving this email because you're subscribed to our updates.</p>
            <p><a href="#">Unsubscribe</a></p>
        </div>
    </div>
</body>

</html>