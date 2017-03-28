<?php
include \view('adm_inc__header');
?>



<div id="v_adm_incite__lsv2">
	<div class="example ivu-row">
		<div class="example-demo ivu-col ivu-col-span-24">
		  <div class="example-case">

      <a name="top"><h1>员工审核</h1></a><br/>

      <div class="ivu-table-header">
        <table width="100%">
          <thead>
            <tr>
              <th style="width:50%;">
                    <i-input icon="android-search" placeholder="请输入员工真实姓名" style="width:100%;" :value.sync="search" ></i-input>
              </th>
              <th style="width:50%;">
                
              </th>
            </tr>
          </thead>
        </table>
      </div>
      <br/>

      <i-table :columns="columns" :data="ls" border></i-table>


      <div class="ivu-table-tip" v-if="loading">
        <table cellspacing="0" cellpadding="0" border="0">
          <tbody>
            <tr >
              <td >
                <i-col class="demo-spin-col" span="50">
                    <Spin fix>
                        <div class="loader">
                            <svg class="circular" viewBox="25 25 50 50">
                                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="5" stroke-miterlimit="10" v-pre></circle>
                            </svg>
                        </div>
                    </Spin>
                </i-col>
              </td>
            </tr>
          </tbody>
        </table>
      </div>

      <div  v-if=" ls == '' && !loading" style="text-align:center"><h3>暂无筛选结果</h3></div>

      <br/>

       <Page :total="count" :page-size="length" @on-change="chengePage"></Page>

			</div>
		</div>
	</div>
</div>









<script>



  var parseTags = function(member_id){

    $.get('/adm_member/get_tags?id='+member_id,
      function(res){
        $('#'+member_id+'_tags').html(res)
      }
    )
  }

  var url = '/adm_invite/aj_ls?'

	$$.vue ({
		el:'#v_adm_incite__lsv2',
    EVENT:['SELECT_ITEM'],
		data:function(){
			return {
            columns: [
                {
                    title: '真实姓名',
                    key: 'real_name'
                },
                {
                    title: '部门',
                    render(row, columns , index){
                      
                      return `
                        <div  id="${row.id}_tags">加载中..</div>
                      `
                    },
                },
                {
                    title: '岗位',
                    key: 'name'
                },
                {
                    title: '手机',
                    key: 'phone'
                },
                
                {
                    title: '操作',
                    align: 'center',
                    render (row, column, index) {
                        return `<i-button type="primary" icon="ios-checkmark" v-if="${row.type} == 0" @click="updateMember(${row.id},1,${index})">批准</i-button>

                        <i-button type="primary" size="small" v-if="${row.type} != 0" @click="selectRole(${row.id})">分组</i-button>
                         <i-button type="error" size="small" v-if="${row.type} != 0" @click="updateMember(${row.id},0,${index})">移除</i-button>`;
                    
                    }
                }
            ],

            ls: [],
            url:'',
            page:1,
            length:10,
            count:0,
            search:'',
            loading:false,

        }
		},

		_init:function(){
			this.resetUrl()
		},


		methods: {
      resetUrl:function(){
        var self = this 
        self.url = url + '&page=' + self.page + '&length=' +self.length + '&search=' +self.search
        self.loaddata()
      },

			loaddata:function(){
				var self = this 
        self.loading = true
        self.ls = []
				$$.ajax({
					url:this.url,
					succ:function(data){
            self.loading = false
            self.setState({
              ls:data.ls,
              page:data.page,
              length:data.length,
              count:data.count,
            })


            self.loadTags(self.ls)
					}
				})
			},

      hd_SELECT_ITEM:function(){
        this.loadTags(this.ls)
      },

      chengePage:function(page){
        var self = this 
        self.page = page
        self.resetUrl()
      },
			

      updateMember:function(member_id,type,index){
        var self = this

        self.ls[index].type = type
        self.setState({
          ls: self.ls,
        })
          $$.ajax({
            method:'post',
            url:'/adm_invite/aj_settype',

            data:{
              id:member_id,
              type:type,
            },


            succ:function(data){
              // alert(type)
              if(type == 0){
                self.$Notice.error({
                  title:'已移除',
                })
              }else{
                self.$Notice.success({
                  title:'已批准',
                })
              }
              
              self.loadTags(self.ls)
            }
          })
      },

      selectRole:function(member_id){
          // alert(member_id)
          $('#Id_Right_Drawer_Content').html('加载中')

              $$.event.pub('OPEN_DRAWER',{width:600})
              $.get('/adm_member/assign_role?member_id='+member_id,function(res){
                $('#Id_Right_Drawer_Content').html(res)
              })
        },


      loadTags:function(data){
        for(var k in data){
          var v = data[k]
          parseTags(v.id)
        }
      },  


		},

    watch:{
      search:function(){
        var self = this 
        self.page = 1
        self.resetUrl()
      },
    }



	})





</script>











<?php
include \view('adm_inc__footer');
