const { addFilter } = wp.hooks;

/**
 * When this function gets run by the addfilter
 * hook below, the filter passes it the block settings
 * or config file.
 */
const filterBlocks = (settings) => {
	if (settings.name !== 'core/post-template') {
		return settings
	}


	var external_wp_blockEditor_namespaceObject = window["wp"]["blockEditor"];
	var external_wp_element_namespaceObject = window["wp"]["element"];
	// var external_wp_coreData_namespaceObject = window["wp"]["coreData"];
	// var external_wp_data_namespaceObject = window["wp"]["data"];
	var external_wp_components_namespaceObject = window["wp"]["components"];
	;// CONCATENATED MODULE: external ["wp","i18n"]
	var external_wp_i18n_namespaceObject = window["wp"]["i18n"];
	;// CONCATENATED MODULE: external ["wp","blockEditor"]
	var external_wp_blockEditor_namespaceObject = window["wp"]["blockEditor"];
	;// CONCATENATED MODULE: external ["wp","serverSideRender"]
	var external_wp_serverSideRender_namespaceObject = window["wp"]["serverSideRender"];

	;// CONCATENATED MODULE: external ["wp","url"]
	var external_wp_url_namespaceObject = window["wp"]["url"];
	;// CONCATENATED MODULE: external ["wp","coreData"]
	var external_wp_coreData_namespaceObject = window["wp"]["coreData"];
	;// CONCATENATED MODULE: external ["wp","data"]
	var external_wp_data_namespaceObject = window["wp"]["data"];

	function _extends() {
		_extends = Object.assign ? Object.assign.bind() : function (target) {
			for (var i = 1; i < arguments.length; i++) {
				var source = arguments[i];

				for (var key in source) {
					if (Object.prototype.hasOwnProperty.call(source, key)) {
						target[key] = source[key];
					}
				}
			}

			return target;
		};
		return _extends.apply(this, arguments);
	}

	function PostTemplateBlockPreview(_ref) {
		let {
			blocks,
			blockContextId,
			isHidden,
			setActiveBlockContextId
		} = _ref;
		const blockPreviewProps = (0,external_wp_blockEditor_namespaceObject.__experimentalUseBlockPreview)({
			blocks,
			props: {
				className: 'wp-block-post  col mb-4'
			}
		});

		const handleOnClick = () => {
			setActiveBlockContextId(blockContextId);
		};

		const style = {
			display: isHidden ? 'none' : undefined
		};
		return (0,external_wp_element_namespaceObject.createElement)("li", _extends({}, blockPreviewProps, {
			tabIndex: 0 // eslint-disable-next-line jsx-a11y/no-noninteractive-element-to-interactive-role
			,
			role: "button",
			onClick: handleOnClick,
			onKeyPress: handleOnClick,
			style: style
		}));
	}

	const MemoizedPostTemplateBlockPreview = (0,external_wp_element_namespaceObject.memo)(PostTemplateBlockPreview);

	const post_template_edit_TEMPLATE = [['core/post-title'], ['core/post-date'], ['core/post-excerpt']];

	function PostTemplateInnerBlocks() {
		const innerBlocksProps = (0,external_wp_blockEditor_namespaceObject.useInnerBlocksProps)({
			className: 'wp-block-post col mb-4'
		}, {
			template: post_template_edit_TEMPLATE
		});
		return (0,external_wp_element_namespaceObject.createElement)("li", innerBlocksProps);
	}

	console.log(settings);




	const newSettings = {
		...settings,
		edit(_ref2) {

			let {
				clientId,
				context: {
					query: {
						perPage,
						offset,
						postType,
						order,
						orderBy,
						author,
						search,
						exclude,
						sticky,
						inherit,
						taxQuery
					} = {},
					queryContext = [{
						page: 1
					}],
					templateSlug,
					displayLayout: {
						type: layoutType = 'flex',
						columns = 1
					} = {}
				}
			} = _ref2;
			const [{
				page
			}] = queryContext;
			const [activeBlockContextId, setActiveBlockContextId] = (0,external_wp_element_namespaceObject.useState)();
			const {
				posts,
				blocks
			} = (0,external_wp_data_namespaceObject.useSelect)(select => {
				const {
					getEntityRecords,
					getTaxonomies
				} = select(external_wp_coreData_namespaceObject.store);
				const {
					getBlocks
				} = select(external_wp_blockEditor_namespaceObject.store);
				const taxonomies = getTaxonomies({
					type: postType,
					per_page: -1,
					context: 'view'
				});
				const query = {
					offset: perPage ? perPage * (page - 1) + offset : 0,
					order,
					orderby: orderBy
				};

				if (taxQuery) {
					// We have to build the tax query for the REST API and use as
					// keys the taxonomies `rest_base` with the `term ids` as values.
					const builtTaxQuery = Object.entries(taxQuery).reduce((accumulator, _ref3) => {
						let [taxonomySlug, terms] = _ref3;
						const taxonomy = taxonomies === null || taxonomies === void 0 ? void 0 : taxonomies.find(_ref4 => {
							let {
								slug
							} = _ref4;
							return slug === taxonomySlug;
						});

						if (taxonomy !== null && taxonomy !== void 0 && taxonomy.rest_base) {
							accumulator[taxonomy === null || taxonomy === void 0 ? void 0 : taxonomy.rest_base] = terms;
						}

						return accumulator;
					}, {});

					if (!!Object.keys(builtTaxQuery).length) {
						Object.assign(query, builtTaxQuery);
					}
				}

				if (perPage) {
					query.per_page = perPage;
				}

				if (author) {
					query.author = author;
				}

				if (search) {
					query.search = search;
				}

				if (exclude !== null && exclude !== void 0 && exclude.length) {
					query.exclude = exclude;
				} // If sticky is not set, it will return all posts in the results.
				// If sticky is set to `only`, it will limit the results to sticky posts only.
				// If it is anything else, it will exclude sticky posts from results. For the record the value stored is `exclude`.


				if (sticky) {
					query.sticky = sticky === 'only';
				} // If `inherit` is truthy, adjust conditionally the query to create a better preview.


				if (inherit) {
					// Change the post-type if needed.
					if (templateSlug !== null && templateSlug !== void 0 && templateSlug.startsWith('archive-')) {
						query.postType = templateSlug.replace('archive-', '');
						postType = query.postType;
					}
				}

				return {
					posts: getEntityRecords('postType', postType, query),
					blocks: getBlocks(clientId)
				};
			}, [perPage, page, offset, order, orderBy, clientId, author, search, postType, exclude, sticky, inherit, templateSlug, taxQuery]);
			const blockContexts = (0,external_wp_element_namespaceObject.useMemo)(() => posts === null || posts === void 0 ? void 0 : posts.map(post => ({
				postType: post.type,
				postId: post.id
			})), [posts]);
			const hasLayoutFlex = layoutType === 'flex' && columns > 1;
			const blockProps = (0,external_wp_blockEditor_namespaceObject.useBlockProps)({
				className: 'row list-unstyled row-cols-1 row-cols-sm-2  row-cols-md-3'
			});

			if (!posts) {
				return (0,external_wp_element_namespaceObject.createElement)("p", blockProps, (0,external_wp_element_namespaceObject.createElement)(external_wp_components_namespaceObject.Spinner, null));
			}

			if (!posts.length) {
				return (0,external_wp_element_namespaceObject.createElement)("p", blockProps, " ", (0,external_wp_i18n_namespaceObject.__)('No results found.'));
			} // To avoid flicker when switching active block contexts, a preview is rendered
			// for each block context, but the preview for the active block context is hidden.
			// This ensures that when it is displayed again, the cached rendering of the
			// block preview is used, instead of having to re-render the preview from scratch.


			return (0,external_wp_element_namespaceObject.createElement)("ul", blockProps, blockContexts && blockContexts.map(blockContext => {
				var _blockContexts$, _blockContexts$2;

				return (0,external_wp_element_namespaceObject.createElement)(external_wp_blockEditor_namespaceObject.BlockContextProvider, {
					key: blockContext.postId,
					value: blockContext
				}, blockContext.postId === (activeBlockContextId || ((_blockContexts$ = blockContexts[0]) === null || _blockContexts$ === void 0 ? void 0 : _blockContexts$.postId)) ? (0,external_wp_element_namespaceObject.createElement)(PostTemplateInnerBlocks, null) : null, (0,external_wp_element_namespaceObject.createElement)(MemoizedPostTemplateBlockPreview, {
					blocks: blocks,
					blockContextId: blockContext.postId,
					setActiveBlockContextId: setActiveBlockContextId,
					isHidden: blockContext.postId === (activeBlockContextId || ((_blockContexts$2 = blockContexts[0]) === null || _blockContexts$2 === void 0 ? void 0 : _blockContexts$2.postId))
				}));
			}));

		},
		save(props) {
			return (
				settings.save(props)
			)
		}
	}

	return newSettings; // now with pink backgrounds!
}

addFilter(
	'blocks.registerBlockType', // hook name, very important!
	'example/filter-blocks', // your name, very arbitrary!
	filterBlocks // function to run
)

// var el = wp.element.createElement;
//
// var withClientIdClassName = wp.compose.createHigherOrderComponent( function (
// 		BlockListBlock
// 	) {
//
// 		return function ( props ) {
// 			if(props.block.name=='core/post-template'){
// 				console.log(props);
// 			}
// 			var newProps = lodash.assign( {}, props, {
// 				className: 'xxxblock-' + props.clientId,
// 			} );
//
// 			return el( BlockListBlock, newProps );
// 		};
// 	},
// 	'withClientIdClassName' );
//
// wp.hooks.addFilter(
// 	'editor.BlockListBlock',
// 	'my-plugin/with-client-id-class-name',
// 	withClientIdClassName
// );
