import React from 'react'
import TimeAgo from 'react-timeago'

export default class StockRow extends React.Component {
	getStockValueColor = (stock) => {
		if (stock.changesPercentage.includes('-')) {
			return 'text-danger';
		} else if (stock.changesPercentage.includes('+')) {
			return 'text-success';
		} else {
			return null;
		}
	};

	render() {
		return (
			<tr id={this.props.stock.ticker} title={this.props.stock.companyName}>
				<td>{this.props.stock.ticker.toUpperCase()}</td>
				<td className={this.getStockValueColor(this.props.stock)}>
					{this.props.stock.changes.toFixed(2)}
				</td>
				<td className="updated_at">
					<TimeAgo date={Date.now()}/>
				</td>
			</tr>
		);
	}
}
