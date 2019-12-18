import React, { Component } from "react";

const Slide = (props) => {
    let styles = {
        width: "100%",
        height: "100%",
        opacity: 0,
        transition: 'all ease-out 0.45s',
    };

    const event = JSON.parse(props.event);
    const url = props.url;

    if (props.index === props.currentIndex + 1) {
        styles = {
            width: "100%",
            height: "100%",
            opacity: 1,
        }
    }

    return (
        <div className={ "slide-item slide-" + (props.index) } style={styles}>
            <div className="slide__content row row--stretch">
                <div className="ctn--image">
                    <img src={props.image} alt={event.title} loading="lazy"/>
                </div>
                <div className="slide__text">
                    <h1>
                        {event.title}
                    </h1>
                    <p>
                        {event.description}
                    </p>
                    <a className="btn btn--white" href={url}>
                        Bekijk details
                    </a>
                </div>
            </div>
        </div>
    );
};

export default Slide;