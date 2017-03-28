<?php
include \view('adm_inc__header');
?>

<script type="text/javascript">
</script>

<div v-cloak  id="v_adm_course__cate" style="background:#FFF;width:100%;height:100%">
    
    <div class="example ivu-row">
      <div class="example-demo ivu-col">
        <div class="example-case">
            
            <h1>成长记录</h1>
            <br/>

            <Radio-group :model.sync="selectTag"  type="button" size="large">
                <Radio v-for="(v,t) in v_2_t" v-bind:value="t"></Radio>
            </Radio-group>
            
            <br/>
            <br>


            <i-table border :content="self" :columns="columns" :data="data"></i-table>

            <div v-if="loading">
              <br>
              <br>
              <spin >加载中...</spin>
            </div>

            <div v-if="!loading && data.length==0">
              <br>
              <br>
              <spin >暂时没有内容</spin>
            </div>

            <br/>
            <Page :total="count" :page-size="length" @on-change="chengePage" ></Page>

        </div>
      </div>

    </div>


</div>


<script>

var loadDetail = function(id){
  $.get('/adm_task/assign_role_inline?course_id='+id,function(res){
    $('#details_'+id).html(res)
  })
}


var parseContent = function (data){
  var r = ''
  var tmp = ''
  console.log(data)
  tmp = data
  try{
    if(typeof data=='string') tmp = $$.str2js(data)
  }catch(e){
    tmp = data
    return tmp
  }

  for(var i in tmp){
    console.log(i)
    if(''+i!='undefined'){
      // r = r+ ('<br>'+i+':<br /> '+ parseContent($$.js2str(tmp[i]))  +'<br />')
      r = r+ ('<br>'+i+':<br /> '+ tmp[i]  +'<br />')
    }
  }
  return r
}

  $$.vue({
    el:'#v_adm_course__cate',
    data:function(){
      return {
        alert:false,
        url:null,
        loading:false,
        add_name:'',
        page:1,
        count:0,
        length:10,
        search: '',
        courses: [],
        selectTag:'<?=$__type?>',
        v_2_t:$$.str2js('<?=\en($__types_v_2_t)?>'),
        t_2_v:$$.str2js('<?=\en($__types_t_2_v)?>'),



        self: this,
        columns: [
            {
                title: '时间',
                width: 200,
                key: 'key'
            },
            {
                title: '员工',
                width: 110,
                key: 'member',
                render (row, column, index) {
                    return `<Icon type="person"></Icon> <strong>${row.real_name}</strong>`;
                }
            },
            {
                title: '内容',
                key: 'content_str',
                // render (row, column, index) {
                //     return `${parseContent($$.str2js(row.content))}`;
                // },

                // render (row, column, index) {
                //     return `<Icon type="person"></Icon> <strong>${row.name}</strong>`;
                // }
            },
        ],
        data: [
            // {
            //     name: '王小明',
            //     age: 18,
            //     address: '北京市朝阳区芍药居'
            // }
        ]

      }
    },

    _init: function() {
      this.loadData()
    },

    methods: {

      show: function (index) {
          this.$Modal.info({
              title: '用户信息',
              content: `姓名：${this.data6[index].name}<br>年龄：${this.data6[index].age}<br>地址：${this.data6[index].address}`
          })
      },

      remove: function (index) {
          this.data6.splice(index, 1);
      },

      chengePage:function(page){
        var self = this
        self.page = page
        self.loadData()
      },

      loadData: function() {
        var self = this

        self.data = []
        self.loading = true

        $$.ajax({
          url:'/adm_growup/aj_ls?&type='+self.t_2_v[self.selectTag]+'&length='+self.length+'&page='+( parseInt(self.page)),
          data:{
          },
          succ:function(data){
            self.data = data.ls
            self.page = data.page
            self.length = data.length
            self.count = data.count
            self.loading = false
          },
          fail:function(){
            self.loading = false
          },
        })
      },

      popAssign: function(id) {
          $('#Id_Right_Drawer_Content').html('加载中')

          $$.event.pub('OPEN_DRAWER',{width:550})
          $.get('/adm_task/assign_role?course_id='+id,function(res){
            $('#Id_Right_Drawer_Content').html(res)
          })
      },


    },



    watch: {
      search: function(val){
        this.page = 1
        this.resetUrl()
      },
      selectTag:function(val){
        // alert(val)
        this.page = 1
        this.loadData()
      },
    }

  })

</script>


<?php
include \view('adm_inc__footer');
