import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import Slide from './Slide';
import LeftArrow from './LeftArrow';
import RightArrow from './RightArrow';

class Slider extends Component {
    constructor(props) {
        super(props);

        this.state = {
            currentIndex: 0,
            translateValue: 0,
            length: 3,
        }
    }

    goToPrevSlide = () => {
        if(this.state.currentIndex === 0) {
            return this.setState({
                currentIndex: 0,
                translateValue: 0
            })
        }

        // This will not run if we met the if condition above
        this.setState(prevState => ({
            currentIndex: prevState.currentIndex - 1,
            translateValue: prevState.translateValue + (this.slideWidth())
        }));
        console.log('prev slide', this.state.currentIndex);
    };

    goToNextSlide = () => {
        // Exiting the method early if we are at the end of the images array.
        // We also want to reset currentIndex and translateValue, so we return
        // to the first image in the array.
        if(this.state.currentIndex === this.state.length - 1) {
            return this.setState({
                currentIndex: 0,
                translateValue: 0
            })
        }

        // This will not run if we met the if condition above
        this.setState(prevState => ({
            currentIndex: prevState.currentIndex + 1,
            translateValue: prevState.translateValue + -(this.slideWidth())
        }));
        console.log('next slide');
    };

    slideWidth = () => {
        return document.querySelector('.slide-item').clientWidth;
    };

    render(props) {
        return (
            <div className="hero">


                <div className="hero__content">
                    <div className="slider-wrapper row row--stretch"
                         style={{
                             transform: `translateX(${this.state.translateValue}px)`,
                             transition: 'transform ease-out 0.45s',
                             width: '100%',
                         }}>
                       {/* {
                            this.state.images.map((image, i) => (
                                <Slide key={i} image={image} index={i}/>
                            ))
                        }*/}
                        <Slide index={1} event={this.props.event1} url={this.props.url1}/>
                        <Slide index={2} event={this.props.event2} url={this.props.url2}/>
                        <Slide index={3} event={this.props.event3} url={this.props.url3}/>
                    </div>
                </div>

                <LeftArrow
                    goToPrevSlide={this.goToPrevSlide}
                />

                <RightArrow
                    goToNextSlide={this.goToNextSlide}
                />
            </div>
        );
    }
}

export default Slider;

if (document.getElementById('event-slider')) {

    ReactDOM.render(
        <Slider
            event1={document.getElementById('event-slider').dataset.event1}
            event2={document.getElementById('event-slider').dataset.event2}
            event3={document.getElementById('event-slider').dataset.event3}
            url1={document.getElementById('event-slider').dataset.url1}
            url2={document.getElementById('event-slider').dataset.url2}
            url3={document.getElementById('event-slider').dataset.url3}
        />, document.getElementById('event-slider'));
}
