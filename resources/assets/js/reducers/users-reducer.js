

export const userSettingsReducer = (state = null, action) => {
  switch (action.type) {
    case "user/GET_SETTINGS":
      return action.payload
      break;

    default:
      break;
  }
  return state;
}
export const pdfNewsReducer = (state = null, action) => {
  switch (action.type) {
    case "user/GET_PDF_NEWS":
      return action.payload
      break;

    default:
      break;
  }
  return state;
}
export const userRelationsReducer = (state =null, action)=>{
  switch (action.type) {
    case "user/GET_RELATIONS":
      return action.payload
      break;

    default:
      break;
  }
  return state;
}
export const currentCommentReducer = (state = null, action)=>{
  switch (action.type) {
    case "user/PIECE_COMMENT_GET":
      return action.payload
      break;
  
    default:
      break;
  }
  return state;
}
export const allCoursesReducer = (state = null, action) => {
  switch (action.type) {
    case "user/GET_ALL_COURSES":
      return action.payload
      break;

    default:
      return state
      break;
  }
  return state
}
export const newsFeedReducer = ( state =null, action) =>{
  switch (action.type) {
    case "user/LOAD_NEWS":
      return action.payload
      break;
  
    default:
    return state
      break;
  }
  return state
}
export const userPicturePiecesReducer=( state = null, action )=>{
	switch (action.type) {
		case "user/PICTURE_PIECES_GET":
			return action.payload
			break;
		
		default:
			return state
			break;
	}
	return state;
}

export const userPiecesReducer =( state = null , action )=>{
	switch (action.type) {
		case "user/TEXT_PIECES_GET":
			return action.payload
			break;
				
		default:
			return state ;
			break;
	}
	return state;
}


export const authenticatedUserReducer = (state=null, action ) =>{ 
	switch (action.type) {
		case "user/AUTHENTICATED":

			return  action.payload === null ? state : action.payload;
		break;
		default:
			return state;
			break;
	}
	return state;
}






