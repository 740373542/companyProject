<?php
include \view('inc_home_header');
?>


<div id="my_test1__index">
    <i-table border :content="self" :columns="columns7" :data="data6"></i-table>
  <!-- <Card style="width:350px">
        <p slot="title">
            <Icon type="ios-film-outline"></Icon>
            经典电影
        </p>
        <a href="#" slot="extra" @click.prevent="changeLimit">
            <Icon type="ios-loop-strong"></Icon>
            换一换
        </a>
        <ul>
            <li v-for="item in movieList | limitBy limitNum limitFrom">
                <a :href="item.url" target="_blank">{{ item.name }}</a>
                <span>
                    <Icon type="ios-star" v-for="n in 4"></Icon><Icon type="ios-star" v-if="item.rate >= 9.5"></Icon><Icon type="ios-star-half" v-else></Icon>
                    {{ item.rate }}
                </span>
            </li>
        </ul>
    </Card> -->
</div>

<script>
    new Vue({
      el:'#my_test1__index',
      // data: function(){
      //   return {
      //     limitNum: 5,
      //     limitFrom: 0,
      //     movieList: [
      //         {
      //             name: '肖申克的救赎',
      //             url: 'https://movie.douban.com/subject/1292052/',
      //             rate: 9.6
      //         },
      //         {
      //             name: '这个杀手不太冷',
      //             url: 'https://movie.douban.com/subject/1295644/',
      //             rate: 9.4
      //         },
      //         {
      //             name: '霸王别姬',
      //             url: 'https://movie.douban.com/subject/1291546/',
      //             rate: 9.5
      //         },
      //         {
      //             name: '阿甘正传',
      //             url: 'https://movie.douban.com/subject/1292720/',
      //             rate: 9.4
      //         },
      //         {
      //             name: '美丽人生',
      //             url: 'https://movie.douban.com/subject/1292063/',
      //             rate: 9.5
      //         },
      //         {
      //             name: '千与千寻',
      //             url: 'https://movie.douban.com/subject/1291561/',
      //             rate: 9.2
      //         },
      //         {
      //             name: '辛德勒的名单',
      //             url: 'https://movie.douban.com/subject/1295124/',
      //             rate: 9.4
      //         },
      //         {
      //             name: '海上钢琴师',
      //             url: 'https://movie.douban.com/subject/1292001/',
      //             rate: 9.2
      //         },
      //         {
      //             name: '机器人总动员',
      //             url: 'https://movie.douban.com/subject/2131459/',
      //             rate: 9.3
      //         },
      //         {
      //             name: '盗梦空间',
      //             url: 'https://movie.douban.com/subject/3541415/',
      //             rate: 9.2
      //         }
      //     ]
      //   }
       
      // },
      // methods: {
      //   changeLimit () {
      //       this.limitFrom = this.limitFrom === 0 ? 5 : 0;
      //   },
      // },
data: {
            visible: false,
            value1: 25,
                self: this,
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
                        address: '北京市朝阳区芍药居'
                    },
                    {
                        name: '张小刚',
                        age: 25,
                        address: '北京市海淀区西二旗'
                    },
                    {
                        name: '李小红',
                        age: 30,
                        address: '上海市浦东新区世纪大道'
                    },
                    {
                        name: '周小伟',
                        age: 26,
                        address: '深圳市南山区深南大道'
                    }
                ]
        },
        methods: {
            handleClick: function() {
              this.$toast('Hello world!')
            },

            show2: function () {
                this.visible = true;
            },

            info: function (nodesc) {
                this.$Notice.info({
                    title: '这是通知标题',
                    desc: nodesc ? '' : '这里是通知描述这里,是通知描述这里是通知描述这里,是通知描述这里,是通知描述这里是通知描述这里是通知描述'
                });
            },
            success: function (nodesc) {
                this.$Notice.success({
                    title: '这是通知标题',
                    desc: nodesc ? '' : '这里是通知描述这里,是通知描述这里是通知描述这里,是通知描述这里,是通知描述这里是通知描述这里是通知描述'
                });
            },
            warning: function (nodesc) {
                this.$Notice.warning({
                    title: '这是通知标题',
                    desc: nodesc ? '' : '这里是通知描述这里,是通知描述这里是通知描述这里,是通知描述这里,是通知描述这里是通知描述这里是通知描述'
                });
            },
            error: function (nodesc) {
                this.$Notice.error({
                    title: '这是通知标题',
                    desc: nodesc ? '' : '这里是通知描述这里,是通知描述这里是通知描述这里,是通知描述这里,是通知描述这里是通知描述这里是通知描述'
                });
            },

            show: function (index) {
                this.$Modal.info({
                    title: '用户信息',
                    content: `姓名：${this.data6[index].name}<br>年龄：${this.data6[index].age}<br>地址：${this.data6[index].address}`
                })
            },
            remove: function (index) {
                this.data6.splice(index, 1);
            },

        }

    })
</script>


