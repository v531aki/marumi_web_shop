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

    fadeInBottom($position) {
        var flag = "NO"
        if (this.state.currentPosition > $position) {
            flag = "YES"
        }
        return (
            flag == "YES" ? "sub-title col-5 float-left fade-in-bottom" : "d-none"
        )
    }
    fadeInLeft($position) {
        var flag = "NO"
        if (this.state.currentPosition > $position){
            flag = "YES"
        } 
        return (
            flag == "YES" ? "sub-title col-5 float-left fade-in-left" : "d-none"
        )
    }
    fadeInRight($position) {
        var flag = "NO"
        if (this.state.currentPosition > $position){
            flag = "YES"
        }
        return (
            flag == "YES" ? "sub-comment offset-2 col-5 float-right fade-in-right" : "d-none"
        )
    }

    render() {
        const FadeInLeft = this.fadeInLeft(100)
        const FadeInRight = this.fadeInRight(100)
        const FadeInLeft1 = this.fadeInLeft(500)
        const FadeInRight1 = this.fadeInRight(500)
        const FadeInLeft2 = this.fadeInLeft(900)
        const FadeInRight2 = this.fadeInRight(900)

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
                        height: "1500px"
                    }}
                >
                    <div className="col-12">
                        <div className="row mt-5">    
                            <div className={FadeInLeft}>
                                <p>ごあいさつ</p>
                            </div>
                            <div className={FadeInRight}>
                                <p>
                                    当店は、京都府の亀岡にある小さなお店です。小さなお店ですが、いろんな生地が、所狭しとそれはそれは沢山置いてあります。お値段もかなりお安く提供しています。<br></br>
                                    生地がお好きな方には、ぜひ知っていただきたいお店です♪
                                </p>
                            </div>
                        </div>
                        <div className="row mt-5">

                                <div className={FadeInLeft1}>
                                    <p>取り扱い製品</p>
                                </div>
                                <div className={FadeInRight1}>
                                    <p>
                                        生地の他には、ハンドメイドのエプロンや、チュニック、バックなども置いています(店内販売のみ)。
                                    </p>
                                </div>

                        </div>
                        <div className="row mt-5">

                                <div className={FadeInLeft2}>
                                    <p>その他ショッピングサイト</p>
                                </div>
                                <div className={FadeInRight2}>
                                    <p>
                                        本サイトのほか、下記の販売サイトにて販売しております。<br></br>
                                        ご利用しやすいサイトにてお買い求めください。！<br></br>
                                        ・<a href="https://www.rakuten.co.jp/kiji-shop-marumi/">楽天市場</a><br></br>
                                        ・<a href="https://minne.com/@tocchan151">minnne</a><br></br>
                                        ・<a href="https://www.creema.jp/c/kijishop-marumi">Creema</a>
                                    </p>
                                </div>

                        </div>
                    </div>
                </div>
            </div>
        );
    }
}

if (document.getElementById('example')) {
    ReactDOM.render(<Example />, document.getElementById('example'));
}
