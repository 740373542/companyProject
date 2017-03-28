<?php
  require \view('adm_inc__header');
?>

<div id="adm_test_index">
  
    <i-table border :content="self" :columns="columns7" :data="data6"></i-table>

</div>

<script type="text/javascript">
  $$.vue({
    el:'#adm_test_index',
    data:function(){
      return {
        columns7: [
                    {
                        title: '姓名',
                        key: 'name',
                        render (row, column, index) {
                            return `<Icon type="person"></Icon> <strong>${row.name}</strong>`;
                        }
                    },
                    {
                        title: '年龄',
                        key: 'age'
                    },
                    {
                        title: '地址',
                        key: 'address'
                    },

                    {
                        title: 'role',
                        // title: 'role_ids',
                        render(row, column, index){
                          return `
                            <div v-for="v in ${row.role_ids}">{{v}}</div>
                          `
                        },
                    },

                    {
                        title: '操作',
                        key: 'action',
                        width: 150,
                        align: 'center',
                        render (row, column, index) {
                            return `<i-button type="primary" size="small" @click="show(${index})">查看</i-button> <i-button type="error" size="small" @click="remove(${index})">删除</i-button>`;
                        }
                    }
                ],
                data6: [
                    {
                        name: '王小明',
                        age: 18,
                        address: '北京市朝阳区芍药居',
                        role_ids:['1','2','3','4'],

                    },
                    {
                        name: '张小刚',
                        age: 25,
                        role_ids:['1','2','3','4'],
                        address: '北京市海淀区西二旗'
                    },
                    {
                        name: '李小红',
                        age: 30,
                        role_ids:['1','2','3','4'],
                        address: '上海市浦东新区世纪大道'
                    },
                    {
                        name: '周小伟',
                        age: 26,
                        role_ids:['1','2','3','4'],
                        address: '深圳市南山区深南大道'
                    }
                ]
      }
    },
  })
</script>