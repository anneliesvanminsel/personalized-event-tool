import React from 'react';

const LeftArrow = (props) => {
    return (
        <div className="slideshow__backArrow slideshow__arrow" onClick={props.goToPrevSlide}>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 54 54" class="icon is-white">
                <path d="M27 0C12.112 0 0 12.112 0 27s12.112 27 27 27 27-12.112 27-27S41.888 0 27 0zm0 52C13.215 52 2 40.785 2 27S13.215 2 27 2s25 11.215 25 25-11.215 25-25 25z"/>
                <path d="M32.413 14.293c-.391-.391-1.023-.391-1.414 0L19.501 25.791c-.667.667-.667 1.751 0 2.418l11.498 11.498c.195.195.451.293.707.293s.512-.098.707-.293c.391-.391.391-1.023 0-1.414L21.12 27l11.293-11.293c.391-.391.391-1.023 0-1.414z"/>
            </svg>
        </div>
    );
};

export default LeftArrow;