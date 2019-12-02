import React, {Component} from 'react';
import Dashboard from './components/Dashboard.jsx'

export default class App extends Component {
	constructor(props) {
		super(props);
		this.state = {
			hasError: false,
			showSpinner: true
		}
	}

	static getDerivedStateFromError(error) {
		// Update state so the next render will show the fallback UI.
		console.log('some error has occurred');
		return {hasError: true};
	}

	componentDidCatch(error, info) {
		// You can also log the error to an error reporting service
		console.log(error, info);
	}

	hideSpinner = () => {
		this.setState({showSpinner: false});
	}

	render() {
		if (this.state.hasError) {
			return <div className="card">
				<div className="card-content">
					You'll have to click on &nbsp;<code>Load Unsafe Scripts</code>&nbsp; to proceed.
					<br/> Please refer to the &nbsp;
					<code>shield icon</code>&nbsp; on your browser's address bar. &#8679;
				</div>
			</div>;
		}
		return (
			<div className="App">
				<Dashboard hideSpinner={this.hideSpinner} showSpinner={this.state.showSpinner}/>
			</div>
		);
	}
}
