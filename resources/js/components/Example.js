import React, { Component } from 'react';
import ReactDOM from 'react-dom';

export default class Example extends Component {
    constructor(props) {
        super(props);
        this.state = {
            currentPosition: 0
        }
    }

    componentDidMount() {
        window.addEventListener('scroll', event => this.watchCurrentPosition(), true)
    }

    componentWillUnmount() {
        window.removeEventListener('scroll')
    }

    watchCurrentPosition() {
        this.setState({
            currentPosition: this.scrollTop(),
        });
        console.log(this.scrollTop())
    }

    scrollTop() {
        return Math.max(
            window.pageYOffset,
            document.documentElement.scrollTop,
            document.body.scrollTop);
    }

    hello() {
        if(this.state.currentPosition > 100){
            return (
                <div>
                    こんにちは
                </div>
            )
        }
    }

    render() {
        const Hello = this.hello()
        return (
            <div className="container">
                <div className="row justify-content-center">
                    <div className="col-12 d-flex align-items-center htcs-flex-container htcs-flex-container-height top-img">
                        <div className="ml-2 title">
                            <h1>生地ショップマルミ</h1>
                            <p>生地＆ハギレ＆ハンドメイド</p>
                        </div>
                    </div>
                    <div
                        style={{
                            height: "5000px"
                        }}
                    >
                        <p>Scroll Top: {this.state.currentPosition}</p>
                        {Hello}
                        <div className={
                            this.state.currentPosition > 100 ? "fade-in-bottom" : "d-none"
                            }
                        >
                            こんばんは
                        </div>
                        <div className="fade-in-bottom"
                        >おはよう</div>
                    </div>
                </div>
            </div>
        );
    }
}

if (document.getElementById('example')) {
    ReactDOM.render(<Example />, document.getElementById('example'));
}
