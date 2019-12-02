import React from 'react'
import StockRow from './StockRow.jsx'

const StockWidget = (props) => {
	return (
		<div className="col col-md-6 offset-md-3">
			<div className="card-header">
				<div className="card-header-title">
					<div className="d-flex align-items-center">
						<strong>Stocks</strong>
						{props.connectionError &&
							<small className="has-text-danger">Server sent no data. Probably the market is closed at the moment.</small>
						}
						{props.showSpinner &&
							<div className="spinner-border ml-auto spinner-border-sm" role="status" aria-hidden="true"></div>
						}
					</div>
				</div>
			</div>
			<div className="table-responsive">
				<table className="table">
					<thead className="thead-dark">
					<tr>
						<th>Name</th>
						<th>Value</th>
						<th>Updated At</th>
					</tr>
					</thead>
					<tbody>
					{Object.keys(props.stocks).map((name, index) => {
						let current_stock = props.stocks[name];
						return (
							<StockRow
								key={index}
								stockName={name}
								stock={current_stock}
							/>
						)
					})}
					{!props.areStocksLoaded() && <tr>
						<td colSpan="4">Loading stocks...</td>
					</tr>}
					</tbody>
				</table>
			</div>
		</div>
	);
}

export default StockWidget;
