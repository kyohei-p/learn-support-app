# This file is generated by gyp; do not edit.

TOOLSET := target
TARGET := v8
### Rules for action "v8_dump_build_config":
quiet_cmd__var_www_html_LaravelReactProject_node_v14_18_3_tools_v8_gypfiles_v8_gyp_v8_target_v8_dump_build_config = ACTION _var_www_html_LaravelReactProject_node_v14_18_3_tools_v8_gypfiles_v8_gyp_v8_target_v8_dump_build_config $@
cmd__var_www_html_LaravelReactProject_node_v14_18_3_tools_v8_gypfiles_v8_gyp_v8_target_v8_dump_build_config = LD_LIBRARY_PATH=$(builddir)/lib.host:$(builddir)/lib.target:$$LD_LIBRARY_PATH; export LD_LIBRARY_PATH; cd $(srcdir)/tools/v8_gypfiles; mkdir -p $(builddir); python ../../deps/v8/tools/testrunner/utils/dump_build_config_gyp.py "$(builddir)/v8_build_config.json" "dcheck_always_on=0" "is_android=0" "is_asan=0" "is_cfi=0" "is_clang=0" "is_component_build=static_library" "is_debug=$(BUILDTYPE)" "is_gcov_coverage=0" "is_msan=0" "is_tsan=0" "is_ubsan_vptr=0" "target_cpu=arm64" "v8_enable_i18n_support=1" "v8_enable_verify_predictable=0" "v8_target_cpu=arm64" "v8_use_siphash=1" "v8_enable_verify_csa=0" "v8_enable_lite_mode=0" "v8_enable_pointer_compression=0"

$(builddir)/v8_build_config.json: obj := $(abs_obj)
$(builddir)/v8_build_config.json: builddir := $(abs_builddir)
$(builddir)/v8_build_config.json: TOOLSET := $(TOOLSET)
$(builddir)/v8_build_config.json: $(srcdir)/deps/v8/tools/testrunner/utils/dump_build_config_gyp.py FORCE_DO_CMD
	$(call do_cmd,_var_www_html_LaravelReactProject_node_v14_18_3_tools_v8_gypfiles_v8_gyp_v8_target_v8_dump_build_config)

all_deps += $(builddir)/v8_build_config.json
action__var_www_html_LaravelReactProject_node_v14_18_3_tools_v8_gypfiles_v8_gyp_v8_target_v8_dump_build_config_outputs := $(builddir)/v8_build_config.json


### Rules for final target.
# Build our special outputs first.
$(obj).target/tools/v8_gypfiles/libv8.a: | $(action__var_www_html_LaravelReactProject_node_v14_18_3_tools_v8_gypfiles_v8_gyp_v8_target_v8_dump_build_config_outputs)

# Preserve order dependency of special output on deps.
$(action__var_www_html_LaravelReactProject_node_v14_18_3_tools_v8_gypfiles_v8_gyp_v8_target_v8_dump_build_config_outputs): | 

LDFLAGS_Debug := \
	-pthread \
	-rdynamic

LDFLAGS_Release := \
	-pthread \
	-rdynamic

LIBS :=

$(obj).target/tools/v8_gypfiles/libv8.a: GYP_LDFLAGS := $(LDFLAGS_$(BUILDTYPE))
$(obj).target/tools/v8_gypfiles/libv8.a: LIBS := $(LIBS)
$(obj).target/tools/v8_gypfiles/libv8.a: TOOLSET := $(TOOLSET)
$(obj).target/tools/v8_gypfiles/libv8.a:  FORCE_DO_CMD
	$(call do_cmd,alink_thin)

all_deps += $(obj).target/tools/v8_gypfiles/libv8.a
# Add target alias
.PHONY: v8
v8: $(obj).target/tools/v8_gypfiles/libv8.a

