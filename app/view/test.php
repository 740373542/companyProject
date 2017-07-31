<?php 
 require \view("header");
?>




<div id="test"></div>



<script type="text/babel">

var FirstComp = React.createClass({

	getInitialState(){
		return{
			ls:'cc',
		}
	},

	componentDidMount(){
	},

	render(){
		return(
			<h1>{this.state.ls}</h1>
		)
	}
})



ReactDOM.render(
	<FirstComp />,
	document.getElementById("test")
)









</script>