import React from 'react'
import StockWidget from './StockWidget.jsx';

// @todo Using Websocket or Mercure Protocol to push Data to Clients.
//const stocksUrl = 'ws://localhost:8000';
const stocksUrl = 'http://localhost:8000';

export default class Dashboard extends React.Component {
	constructor(props) {
		super(props);
		this.state = {
			stocks: {},
			connectionError: false,
			showSpinner: false
		}
	}

	componentDidMount = () => {
		try {
			this.setState({showSpinner: true})
			setInterval(async () => {
				const response = await fetch(stocksUrl + '/stock/actives');
				const stocks = await response.json();
				this.setState({
					stocks: stocks.mostActiveStock,
					showSpinner: false
				})
			}, 10000);
		} catch (e) {
			console.log(e);
		}
	}

	componentWillUnmount() {
		clearInterval(this.interval);
	}

	areStocksLoaded = () => {
		return Object.keys(this.state.stocks).length > 0;
	}

	render() {
		return (
			<div className="container">
				<StockWidget
					stocks={this.state.stocks}
					areStocksLoaded={this.areStocksLoaded}
					connectionError={this.state.connectionError}
					showSpinner={this.state.showSpinner}
				/>
			</div>
		);
	}
}
