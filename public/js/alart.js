// alert("Hello World!")
window.onload = function(){
    // =============非同期検索================
    $('button').on('click',function(){
        const searchCharacter = $('#search').val(); 
        $.ajax({
            type:'GET',
            url:'/search',
            data:{'search':searchCharacter},
            datatype:'JSON',
        })
        .done(function(data){//成功したら、
            //もしdata（コントローラから送られてきたjsonデータ）の中身が何もなければ
            if (data.length === 0){
                alert("検索結果はヒットしませんでした");
            }else{
                console.log(data);
                $('.card').remove();

                let html = '';
                $.each(data,function(card,value){
                    let id = value.id;
                    let img_path = value.img_path;
                    let name = value.name;
                    let attribute = value.attribute_id;
                    let weapon = value.weapon_id;
                    html = `
                    <div class="card" style="width: 18rem;">
                        <img src="Storage/${img_path}" width="100%" class="card-img-top" alt="noimage">

                      <div class="card-body">
                         <h5 class="card-title">${name}</h5>
                         <p class="card-text">

                          <a href="/detail/${id}" class="btn btn-primary">Go somewhere</a>
                        <form class="id">
                         <input type="submit" class="btn btn-danger" character_id="${id}" value="TEST">
                        </form>
                      </div>
                    </div>
                        `;
                        $('.top-character').append(html);
                });
            }
        })
    });
    // =============非同期検索================

    
    // =============非同期削除================
    $(function() {
        $(".btn-danger").on("click", function() {
           var deleteCheker = confirm("本当に削除しますか？");
        // deleteCheckerにYESならtrue,NOならfalseを代入

            if(deleteCheker == true){
                //trueなら現在表示しているIDを変数に代入する
                var clickDel =$(this)
                var characterID = clickDel.attr('character_id')

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                    });
                $.ajax({
                        type:'post',
                        url:'destroy',
                        data:{'id':characterID,},
                        datatype:'json',
                        async:true,
                        cache:false,
                    })

                .done(function(data){
                    console.log(data);
                    alert("OK");
                    // clickDel.parents('#card').remove
                })
                .fail(function(jqXHR,textStatus,errorThrown){
                    alert("No");
                    console.log(jqXHR);
                    console.log(textStatus);
                    console.log(errorThrown);
                });
            }else{
                (function(e){
                    e.preventDefault()
                });
            };
        });
    });
    // =============非同期削除================

};