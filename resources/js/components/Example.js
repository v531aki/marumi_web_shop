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

    fadeInBottom() {
        return (
            this.state.currentPosition > 100 ? "sub-title float-left mt-5 fade-in-bottom" : "d-none"
        )
    }
    fadeInLeft() {
        return (
            this.state.currentPosition > 100 ? "sub-title float-left mt-5 fade-in-left" : "d-none"
        )
    }

    render() {
        const FadeInBottom = this.fadeInBottom()
        const FadeInLeft = this.fadeInLeft()
        return (
            <div className="container-fluid p-0">
                <div className="row justify-content-center">
                    <div className="col-12 p-0 d-flex align-items-center htcs-flex-container htcs-flex-container-height top-img">
                        <div className="title">
                            <h1 className="fade-in-bottom">生地ショップマルミ</h1>
                            <p className="fade-in-bottom">生地＆ハギレ＆ハンドメイド</p>
                        </div>
                    </div>
                </div>
                <div className="row"
                    style={{
                        height: "5000px"
                    }}
                >
                    <div className="offset-1 col-11">
                        <div className={FadeInLeft}>
                            <p>ごあいさつ</p>
                        </div>
                    </div>
                    <p>Scroll Top: {this.state.currentPosition}</p>
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
        );
    }
}

if (document.getElementById('example')) {
    ReactDOM.render(<Example />, document.getElementById('example'));
}
