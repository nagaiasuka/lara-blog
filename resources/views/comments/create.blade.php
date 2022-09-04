@extends('layouts.app_original')
@section('content')
<div class="container">
      
  <div class="row justify-content-center mt-5">
      <div class="col-md-8">
        <h2>以下の記事にコメントします</h2>
          <div class="card mt-3">
              <div class="card-header">
                  <h5>タイトル：</h5>
              </div>
              <div class="card-body">
              <p class="card-text">内容：</p>
              <p>投稿日時：</p>
              
              </div>
          </div>
      </div>
  </div>
  <div class="row justify-content-center mt-5">
    <div class="col-md-8">
        <form action="#" method="post">
            <input type="hidden" name="post_id" value="#">
            <div class="form-group">
                <label>コメント</label>
                <textarea class="form-control" 
                placeholder="内容" rows="5" name="body"></textarea>
            </div>
            <button type="submit" class="btn btn-primary mt-3">コメントする</button>
        </form>
    </div>
  </div>
</div>
@endsection
