@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <div class="container">
                        <?php foreach ($comments as $comment): ?>
                            <?php echo "<br/>".$comment->id . "-". $comment->message; ?>
                        <?php endforeach; ?>
                    </div>

                    <?php echo $comments->render(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
