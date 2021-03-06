@extends('layouts.appnav')
@section('title')
  QB | {{$found->title}}
@endsection
@section('content')
<div class="container" style="padding:0; margin:0; margin-top:80px;width:100%">
    <div id='paper-view'></div>
    <div class="container phone-m-less">
      <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 phone-m-less">
        <div class="thumbnail view-thumbnail clearfix" style="padding:20px;margin-bottom:5px;">
          <h2 style=" color:black; padding:7px;">{{$found->title}}</h2>
          <div style="padding:20px;padding-top:0px; min-height:200px; max-height:515px;overflow-y:scroll; 
                border:solid 0px black; border-bottom-width:2px; margin-bottom:10px;">
            <p>{{$found->body}}<br>
              ----------------------<br>
              Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maxime ducimus cupiditate soluta 
              saepe totam quis, suscipit est unde voluptatibus iusto nam magni excepturi officiis amet 
              quidem omnis alias. Provident, placeat.
              Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maxime ducimus cupiditate soluta 
              saepe totam quis, suscipit est unde voluptatibus iusto nam magni excepturi officiis amet 
              quidem omnis alias. Provident, placeat.
              Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maxime ducimus cupiditate soluta 
              saepe totam quis, suscipit est unde voluptatibus iusto nam magni excepturi officiis amet 
              quidem omnis alias. Provident, placeat.
              Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maxime ducimus cupiditate soluta 
              saepe totam quis, suscipit est unde voluptatibus iusto nam magni excepturi officiis amet 
              quidem omnis alias. Provident, placeat.
              Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maxime ducimus cupiditate soluta 
              saepe totam quis, suscipit est unde voluptatibus iusto nam magni excepturi officiis amet 
              quidem omnis alias. Provident, placeat.
              Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maxime ducimus cupiditate soluta 
              saepe totam quis, suscipit est unde voluptatibus iusto nam magni excepturi officiis amet 
              quidem omnis alias. Provident, placeat.
              Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maxime ducimus cupiditate soluta 
              saepe totam quis, suscipit est unde voluptatibus iusto nam magni excepturi officiis amet 
              quidem omnis alias. Provident, placeat.
            </p>
          </div>
          @if(Auth::user()->id == $found->user_id)
            <button class="btn btn-danger btn-sm z-depth-1" id="delete"><i class="fa fa-trash"></i></button> 
          @endif
          <small class="label label-default rounded z-depth-1" style="padding:6px 10px; ">By {{'@'.$found->user->name}}</small>
          <small class="label label-primary rounded z-depth-1" style="padding:6px 10px; ">{{$found->course}}</small>
          <small class='text text-default number-font'>{{$found->created_at->diffForHumans()}}</small>
          <div class = "pull-right"> 
            @if($user_has_liked)
             <small class="cursor text text-danger"  id="liked"><i class='fa fa-thumbs-up'></i> <span class ='number-font' id="liked-span">{{count($found->likes)}}</span></small>
              <small class="cursor"style="display:none" id="like"><i class='fa fa-thumbs-up'></i> <span class ='number-font' id="like-span">{{count($found->likes)}}</span></small>
            @else
              <small class="cursor text text-danger" style="display:none" id="liked"><i class='fa fa-thumbs-up'></i> <span class ='number-font' id="liked-span">{{count($found->likes)}}</span></small>
              <small class="cursor" id="like"><i class='fa fa-thumbs-up'></i> <span class ='number-font' id="like-span">{{count($found->likes)}}</span></small>
            @endif
             <small class="cursor"data-toggle="modal" data-target="#comments-modal-box"><i class='fa fa-comment'></i> 
              <span class ='number-font comment-number'>{{count($found->comments)}}</span></small>
          </div>
        </div>
          {{--  <--------------------COMMENTING SECTION-------------->  --}}
        <div class="thumbnail zero-radius z-depth-1" style="padding:20px;margin-top:5px; height:100px;background:navajowhite"> 
            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-8">
                  <textarea class="form-control" placeholder="say something..." id="c-body"></textarea>
                  <small class='dark-text' style='display:none;padding:7px;margin:10px;color:green;'id='c-status'><i>commenting <span class='fa fa-spinner fa-spin'></span></i></small>
                  <input type="hidden" value ="{{$found->id}}" id="c-pieceID" />
                  <input type="hidden" value ="paper" id="c-type" />
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-4">
              
              <button class="btn btn-default user-badge-comment rounded v-c-b" id="c-btn" style="margin-top:10px;">{{'@'.Auth::user()->name}}</button>
            </div>
          </form>
        </div>
        <div class="other-links" style=""> 
          @foreach($similar as $piece)
              <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12" style="padding-right:3px; padding-left:3px;"> 
                <div class="thumbnail z-depth-2 dark-text similar">
                  <p ><a style="color:crimson" href="/paper-view/MBZyU9WoGvD3M3OcszZ8skHvoPputaKIhq9uPmW6ZqImU8iwby1xOdirul1w2gGEgo2n2kZGRGjnVHaELEC1flWfpkOC1fM87KnTzlGW2Ah3BcoCOc9nlcB4cPNTcz8XK6SpztbVJk0zDwCpLparTW/{{$piece->id}}" target="_blank" > {{$piece->title}}</a></p>
                  <p class="angel">By: @Agyingo</p>
                  <p class="angel">{{$piece->course}}</p>
                </div>
              </div>
          @endforeach
        </div>
      </div>
      <div class='modal fade' id="comments-modal-box" style="border-radius:15px;border:solid 2px orange;"> 
        <div class="modal-dialog modal-md">
          <div class="modal-content">
            <div class="modal-body" style="max-height:400px; overflow-y:scroll;  border-radius:10px;">
               @forelse($app_comments as $comment)
                  <div style="margin:6px">
                    <div class="comment-item-text rounded" id="lil-comment-{{$comment->id}}"> 
                      <small class='comment-item-title dark-text' style=""><b>{{$comment->user->name}}</b></small> 
                      @if(Auth::user()->id == $comment->user_id)
                       <small><a href="#" class="lil-com" data-id="{{$comment->id}}"style="color:crimson">delete</a></small>
                      @endif
                       <small  class=''><p>{{$comment->body}}</p></small>
                     
                    </div>
                  </div>
                @empty
                  <center> 
                      <p style="margin:15px"> Be the first to comment <span class='fa fa-search'></span></p>
                  </center>
               @endforelse
            </div>
          </div>
        </div>
      </div>
    </div>    
</div>
@endsection
@section('scripts')
  <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
	<script> 
    var paperID = {{$found->id}};
    var userID = {{Auth::user()->id}};
    $(document).ready(function(){
       var deleteComment=function(id){
        $.ajax({method:"get",url:'/delete-comment/'+id})
        .done(function(){
          $('#lil-comment-'+id).fadeOut(400);
        });
      }
      $('.lil-com').click(function(){
        deleteComment($(this).attr('data-id'));
      });
     
      var doDelete = function(){
        $.ajax({method:'get',url:"/me/delete-paper/"+paperID})
        .done(function(){
          window.close();
        });
      }

      $('#delete').click(function(){
        doDelete();
      })
      var backEndLike = function(){
        $.ajax({method:'get',url:'/me/like',data:{paper_piece_id:paperID,user_id:userID}});
      }
      $('#like').click(function(){
        doLike();
        backEndLike();
      });
       $('#liked').click(function(){
        unLike();
        backEndLike();
      });
      var doLike=function(){
        var num = Number(document.getElementById('like-span').innerHTML) +1;
        $('#like').fadeOut(function(){
           $('#liked').fadeIn();
        });
        document.getElementById('liked-span').innerHTML=num; 
        
      };
       var unLike=function(){
        var num = Number(document.getElementById('liked-span').innerHTML) -1;
         $('#liked').fadeOut(function(){
           $('#like').fadeIn();
        });
        document.getElementById('like-span').innerHTML=num; 
       
      };
      var doCommenting = function(){
        var body = $('#c-body').val(); 
        var type = $('#c-type').val(); 
        var id= $('#c-pieceID').val();
        if($.trim(body) !==""){
          $('#c-status').fadeIn();
          $.ajax({method:'get',url:"/me/save-comment",data:{body:body, type:type, pieceID:id}})
          .done(function(){
            setTimeout(function(){
              $('#c-status').fadeOut(function(){
                 $('#c-body').val("");
                 var theNumber = Number($('.comment-number').text())+1;
                 $('.comment-number').text(theNumber);
              });
            },500)
          });
        }
        else{
          alert("You have not written anything!");
        }
      }
      $('#c-btn').on('click',function(){
        doCommenting();
      });
    });
	</script>
@endsection 
