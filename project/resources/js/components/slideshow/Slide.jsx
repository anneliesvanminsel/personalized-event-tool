import React, { Component } from "react";
import ReactDOM from "react-dom";
/*
class Slide extends Component {
    render() {
        return (
            <div className="row row--stretch">
                <div className="ctn--image">
                    <img
                        src="https://images.pexels.com/photos/801863/pexels-photo-801863.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260"
                        alt=""
                    />
                </div>
                <div className="hero__text">
                    <h1>
                        lala
                    </h1>
                    <p>
                        sflkqsmldkfkqsfmlkqmldfklmqksdflm

                    </p>
                    <p>
                        LSKDLKDFMQ
                    </p>
                    <a className="btn btn--white" href="#">
                        Bekijk tickets
                    </a>
                </div>
            </div>
        );
    }
}

export default Slide;
*/
const Slide = (props) => {
    const styles = {
        width: "100%",
        height: "100%"
    };

    const event = JSON.parse(props.event);
    const url = props.url;

    return (
        <div className={ "slide-item slide-" + (props.index) } style={styles}>
            <div className="hero__content row row--stretch">
                <div className="ctn--image">
                    <img src={event.logo} alt=""/>
                </div>
                <div className="hero__text">
                    <h1>
                        {event.title}
                    </h1>
                    <p>
                        {event.description}
                    </p>
                    <a className="btn btn--white" href={url}>
                        Bestel tickets
                    </a>
                </div>
            </div>
        </div>
    );
};

export default Slide;