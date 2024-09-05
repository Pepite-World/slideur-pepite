// External Dependencies
import React, { Component } from 'react';
import PepiteSliderItem from './PepiteSliderItem';

class PepiteSlider extends Component {

  static slug = 'pesl_pepite_slider';

  render() {
    // const Content = this.props.content;
    // console.log(this.props.content)
    return (
    <>
      <h1>
        PESL Content
      </h1>
      <PepiteSliderItem />
    </>
    );
  }
}

export default PepiteSlider;
