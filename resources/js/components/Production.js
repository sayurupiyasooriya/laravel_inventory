import React from 'react';
import ReactDOM from 'react-dom';

function Production() {
    return (
        <div className="container">
            <div className="row justify-content-center">
                <div className="col-md-8">
                    <div className="card">
                        <div className="card-header">Example Component</div>

                        <div className="card-body">I'm an example component!</div>
                    </div>
                </div>
            </div>
        </div>
    );
}
export default Production;

function Wel() {
    return (
        <div className="container">
            <div className="row justify-content-center">
                <div className="col-md-8">
                    <div className="card">
                        <div className="card-header">Example Component</div>

                        <div className="card-body">I'm an example component!</div>
                    </div>
                </div>
            </div>
        </div>
    );
}
export class Wel;

if (document.getElementById('production')) {
    ReactDOM.render(<Production />, document.getElementById('production'));
}

if (document.getElementById('wel')) {
    ReactDOM.render(<Wel />, document.getElementById('wel'));
}

